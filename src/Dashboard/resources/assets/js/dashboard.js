$(document).ready(function() {
    $.ajaxSetup({
        data: {
            '_token': $('meta[name="csrf"]').attr('content')
        }
    });

    $('[data-toggle="tooltip"]').tooltip();

    var notifications = $('.btn-notification').popover({
        container: 'body',
        customClass: 'notifications',
        content: $('#template-notifications').html()
    });

    if($('.btn-notification').attr('show') != undefined) {
        notifications.popover('show');
    }

    $('nav .nav-treeview').each(function(index, navTreeview) {
        var items = $(navTreeview).find('.nav-item').length;
        var title = $(navTreeview).data('title');

        if(items > 0) {
            $(navTreeview).parent().removeClass('d-none');
        }

        var isOpen = localStorage.getItem('sidebar-' + title);
        if(isOpen == 'true') {
            $('.nav-link[data-title="'+title+'"]').parent().addClass('menu-open');
        }
    });

    $('#kt_aside_menu ul.menu-nav li').each(function(index, menuItem) {
        var items = $(menuItem).find('.menu-submenu');
        if(items.length){
            let _li = $(items).find('.menu-subnav li').length;
            if(_li === 0){
                $(menuItem).remove()
            }else{
                $(menuItem).removeClass('d-none')
            }
        }
    });

    $('#add-bookmark').on('click', function() {
        var star = $(this);
        var type = star.attr('data-type');

        if(type == 'add') {
            Swal.fire({
                title: 'عنوان نشانه گزاری را وارد نمایید',
                input: 'text',
                inputValue: $('meta[name="page_title"]').attr('content'),
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                cancelButtonText: 'لغو',
                confirmButtonText: 'افزودن',
            })
            .then(function(result) {
                if (result.isConfirmed) {
                    bookmarkHandle(star, type, result.value);
                }
            });
        }
        else {
            bookmarkHandle(star, type, undefined);
        }
        
    });

    function bookmarkHandle(star, type, value) {
        $.ajax({
            url: '/dashboard/handle-bookmark',
            method: 'POST',
            data: {
                title: value,
                type: type,
                id: star.attr('data-id'),
                url: location.pathname+location.search
            },
            success: function(response) {
                if(type == 'add') {
                    star.attr('data-type', 'remove').attr('data-id', response.id);
                    star.find('i').removeClass('far').addClass('fas');

                    Swal.fire({
                        icon: 'success',
                        title: 'پیام سیستم',
                        text: 'نشانه گزاری با موفقیت انجام شد'
                    });
                }
                else {
                    star.attr('data-type', 'add').attr('data-id', null);
                    star.find('i').removeClass('fas').addClass('far');
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'پیام سیستم',
                    text: 'نشانه گزاری انجام نشد، لطفا یک عنوان وارد نمایید'
                });
            }
        });
    }

    $(document).on('click', '[confirm]', function(event) {
        var el = $(this);
        event.preventDefault();

        var icon = $(this).attr('confirm-icon');
        icon = icon == undefined ? 'warning' : icon;
        var title = $(this).attr('confirm-title');
        title = title == undefined ? 'اخطار' : title;
        var message = $(this).attr('confirm-message');
        message = message == undefined ? 'آیا از حذف آیتم مورد نظر مطمئن هستید؟' : message;

        Swal.fire({
            title: title,
            text: message,
            icon: icon,
            showCancelButton: true,
            confirmButtonText: 'بله',
            cancelButtonText: 'خیر'
        }).then(function(result) {
            if(result.isConfirmed) {
                if(el.prop('tagName') == 'A') {
                    window.location.href = el.attr('href');
                }
                else {
                    $('form').submit();
                }
            }
        });
    });

    $(document).on('click', '[credential]', function(event) {
        var credentialBtn = this;

        event.preventDefault();
    
        $.ajax({
            url: '/dashboard/ajax/auth/credential-check',
            method: 'get',
            success: function(response) {
                if(response.result && (typeof handleTrustedCredential === "function")) {
                    handleTrustedCredential(credentialBtn);
                }
                else if(!response.result && (typeof handleUnTrustedCredential === "function")) {
                    handleUnTrustedCredential(credentialBtn);
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'پیام سیستم',
                    text: 'خطایی رخ داده است'
                });
            }
        });
    });
});

function random(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}