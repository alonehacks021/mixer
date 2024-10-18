<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl" x-data="function() {
	return {
		themeMode: localStorage.getItem('theme') ? localStorage.getItem('theme') : 'light'
	};
} ()" :data-theme="`${themeMode}`">
	<head>
		<title>{{get_page_title()}}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		{{-- <link rel="shortcut icon" href="assets/media/logos/favicon.ico" /> --}}
		<link href="{{asset('vendor/dashboard/metronic/metronic-23/css/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('vendor/dashboard/metronic/metronic-23/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('vendor/dashboard/fonts/iran-yekan-x/fonts.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('vendor/dashboard/fontawesome-free-6.4.2-web/css/all.min.css')}}" rel="stylesheet" type="text/css" />
	</head>
	<body id="kt_app_body" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default">
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate-="true" data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
					<div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
						<div class="app-header-wrapper d-flex flex-grow-1 align-items-stretch justify-content-between" id="kt_app_header_wrapper">
							<div class="app-header-menu app-header-mobile-drawer align-items-start align-items-lg-center w-100" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
								<div class="menu menu-rounded menu-column menu-lg-row menu-active-bg menu-state-primary menu-title-gray-700 menu-arrow-gray-400 menu-bullet-gray-400 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
									<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-end" class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
										<span class="menu-link">
											<span class="menu-title">sdasd</span>
											<span class="menu-arrow d-lg-none"></span>
										</span>
									</div>
								</div>
							</div>
							<div class="d-flex align-items-center">
								<div class="btn btn-icon btn-color-gray-600 btn-active-color-primary ms-n3 me-2 d-flex d-lg-none" id="kt_app_sidebar_toggle">
									<span class="svg-icon svg-icon-2">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />
										</svg>
									</span>
								</div>
								<a href="../../demo23/dist/index.html" class="d-flex d-lg-none">
									<img alt="Logo" src="{{env('APP_LOGO')}}" class="h-20px theme-light-show" />
									<img alt="Logo" src="{{env('APP_LOGO')}}" class="h-20px theme-dark-show" />
								</a>
							</div>
							<div class="app-navbar flex-shrink-0">
								<div class="app-navbar-item ms-1 ms-lg-3">
									<div class="btn btn-icon btn-circle btn-color-gray-500 btn-active-color-primary btn-custom shadow-xs bg-body" id="kt_drawer_chat_toggle">
										<i class="fa-regular fa-comments fs-2"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="275px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_toggle">
						<div class="d-flex flex-stack px-4 px-lg-6 py-3 py-lg-8" id="kt_app_sidebar_logo">
							<a href="../../demo23/dist/index.html">
								<img alt="Logo" src="{{env('APP_LOGO')}}" class="h-20px h-lg-25px theme-light-show" />
								<img alt="Logo" src="{{env('APP_LOGO')}}" class="h-20px h-lg-25px theme-dark-show" />
							</a>
							<div class="ms-3">
								<div class="cursor-pointer position-relative symbol symbol-circle symbol-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
									<img src="{{auth()->user()?->thumbnail_url}}" alt="user" />
									<div class="position-absolute rounded-circle bg-success start-100 top-100 h-8px w-8px ms-n3 mt-n3"></div>
								</div>
								<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
									<div class="menu-item px-3">
										<div class="menu-content d-flex align-items-center px-3">
											<div class="symbol symbol-50px me-5">
												<img alt="Logo" src="{{auth()->user()?->thumbnail_url}}" />
											</div>
											<div class="d-flex flex-column">
												<div class="fw-bold d-flex align-items-center fs-5">
													{{auth()->user()?->full_name}}
													<span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{{auth()->user()?->type_text}}</span>
												</div>
												<a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{auth()->user()?->username}}</a>
											</div>
										</div>
									</div>
									<div class="separator my-2"></div>
									<div class="menu-item px-5">
										<a href="../../demo23/dist/account/overview.html" class="menu-link px-5">پروفایل من</a>
									</div>
									<div class="separator my-2"></div>
									<div class="menu-item px-5">
										<a href="../../demo23/dist/authentication/layouts/corporate/sign-in.html" class="menu-link px-5">
											<i class="fa-solid fa-arrow-right-from-bracket me-2 text-danger"></i>
											خروج
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="flex-column-fluid px-4 px-lg-8 py-4" id="kt_app_sidebar_nav">
							<div id="kt_app_sidebar_nav_wrapper" class="d-flex flex-column hover-scroll-y pe-4 me-n4" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar, #kt_app_sidebar_nav" data-kt-scroll-offset="5px">
								
								<div class="d-flex mb-3 mb-lg-6">
									<div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 me-6">
										<span class="fs-6 text-gray-500 fw-bold">بودجه</span>
										<div class="fs-2 fw-bold text-success">$14,350</div>
									</div>
									<div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4">
										<span class="fs-6 text-gray-500 fw-bold">صرف کرد</span>
										<div class="fs-2 fw-bold text-danger">$8,029</div>
									</div>
								</div>
								<div class="mb-6">
									<h3 class="text-gray-800 fw-bold mb-8">سرویس ها</h3>
									<div class="row row-cols-2 row-cols-lg-3" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
										<div class="col mb-4">
											<a href="../../demo23/dist/apps/calendar.html" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-90px h-90px border-gray-200" data-kt-button="true">
												<span class="mb-2">
													<i class="fa-solid fa-home fs-2"></i>
												</span>
												<span class="fs-7 fw-bold">ABCS</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="flex-column-auto d-flex flex-center px-4 px-lg-8 py-3 py-lg-8" id="kt_app_sidebar_footer">
							<div class="app-footer-item">
								<a href="#" data-bs-toggle="tooltip" title="حالت روز" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px"
									x-on:click="themeMode = 'light'; localStorage.setItem('theme', themeMode);">
									<i class="fa-regular fa-sun fs-2"></i>
								</a>

								<a href="#" data-bs-toggle="tooltip" title="حالت شب" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px"
									x-on:click="themeMode = 'dark'; localStorage.setItem('theme', themeMode);">
									<i class="fa-regular fa-moon fs-2"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<div class="d-flex flex-column flex-column-fluid">
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<div id="kt_app_content_container" class="app-container container-xxl">{{$slot}}</div>
							</div>
						</div>
						<div id="kt_app_footer" class="app-footer">
							<div class="app-container container-xxl d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
								<div class="text-dark order-2 order-md-1">
									<span class="text-muted fw-semibold me-1">{{jdate()->format('Y')}}&copy;</span>
									<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">
										نهاد نمایندگی مقام معظم رهبری	
									</a>
								</div>
								<ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
									<li class="menu-item">
										<a href="/about" target="_blank" class="menu-link px-2">درباره</a>
									</li>
									<li class="menu-item">
										<a href="/ticket/tickets" target="_blank" class="menu-link px-2">پشتیبانی</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="kt_activities" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="activities" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'lg': '900px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_activities_toggle" data-kt-drawer-close="#kt_activities_close">
			<div class="card shadow-none border-0 rounded-0">
				<div class="card-header" id="kt_activities_header">
					<h3 class="card-title fw-bold text-dark">گزارش ها</h3>
					<div class="card-toolbar">
						<button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5" id="kt_activities_close">
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
						</button>
					</div>
				</div>
				<div class="card-body position-relative" id="kt_activities_body">
					<div id="kt_activities_scroll" class="position-relative scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_activities_body" data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer" data-kt-scroll-offset="5px">
						<div class="timeline">
							<div class="timeline-item">
								<div class="timeline-line w-40px"></div>
								<div class="timeline-icon symbol symbol-circle symbol-40px me-4">
									<div class="symbol-label bg-light">
										<span class="svg-icon svg-icon-2 svg-icon-gray-500">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="currentColor" />
												<path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="currentColor" />
											</svg>
										</span>
									</div>
								</div>
								<div class="timeline-content mb-10 mt-n1">
									<div class="pe-3 mb-5">
										<div class="fs-5 fw-semibold mb-2">در پروژه اپلیکیشن موبایل  کار جدید برای شما وجود دارد:</div>
										<div class="d-flex align-items-center mt-1 fs-6">
											<div class="text-muted me-2 fs-7">اضافه شده در ساعت 4:12</div>
											<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Nina Nilson">
												<img src="assets/media/avatars/300-14.jpg" alt="img" />
											</div>
										</div>
									</div>
									<div class="overflow-auto pb-5">
										<div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-5">
											<a href="../../demo23/dist/apps/projects/project.html" class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">ملاقات با مشتری</a>
											<div class="min-w-175px pe-2">
												<span class="badge badge-light text-muted">طراح نرم افزار</span>
											</div>
											<div class="symbol-group symbol-hover flex-nowrap flex-grow-1 min-w-100px pe-2">
												<div class="symbol symbol-circle symbol-25px">
													<img src="assets/media/avatars/300-2.jpg" alt="img" />
												</div>
												<div class="symbol symbol-circle symbol-25px">
													<img src="assets/media/avatars/300-14.jpg" alt="img" />
												</div>
												<div class="symbol symbol-circle symbol-25px">
													<div class="symbol-label fs-8 fw-semibold bg-primary text-inverse-primary">A</div>
												</div>
											</div>
											<div class="min-w-125px pe-2">
												<span class="badge badge-light-primary">درحال پردازش</span>
											</div>
											<a href="../../demo23/dist/apps/projects/project.html" class="btn btn-sm btn-light btn-active-light-primary">نمایش</a>
										</div>
										<div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0">
											<a href="../../demo23/dist/apps/projects/project.html" class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">آماده سازی تحویل پروژه</a>
											<div class="min-w-175px">
												<span class="badge badge-light text-muted">توسعه دهنده سیستم</span>
											</div>
											<div class="symbol-group symbol-hover flex-nowrap flex-grow-1 min-w-100px">
												<div class="symbol symbol-circle symbol-25px">
													<img src="assets/media/avatars/300-20.jpg" alt="img" />
												</div>
												<div class="symbol symbol-circle symbol-25px">
													<div class="symbol-label fs-8 fw-semibold bg-success text-inverse-primary">B</div>
												</div>
											</div>
											<div class="min-w-125px">
												<span class="badge badge-light-success">کامل شد</span>
											</div>
											<a href="../../demo23/dist/apps/projects/project.html" class="btn btn-sm btn-light btn-active-light-primary">نمایش</a>
										</div>
									</div>
								</div>
							</div>
							<div class="timeline-item">
								<div class="timeline-line w-40px"></div>
								<div class="timeline-icon symbol symbol-circle symbol-40px">
									<div class="symbol-label bg-light">
										<span class="svg-icon svg-icon-2 svg-icon-gray-500">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="currentColor" />
												<path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="currentColor" />
											</svg>
										</span>
									</div>
								</div>
								<div class="timeline-content mb-10 mt-n2">
									<div class="overflow-auto pe-3">
										<div class="fs-5 fw-semibold mb-2">دعوت نامه برای ساخت طراحی های جذاب که کارگاه انسانی رابیانمی کنند</div>
										<div class="d-flex align-items-center mt-1 fs-6">
											<div class="text-muted me-2 fs-7">ارسال شده در ساعت 4:23</div>
											<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Alan Nilson">
												<img src="assets/media/avatars/300-1.jpg" alt="img" />
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="timeline-item">
								<div class="timeline-line w-40px"></div>
								<div class="timeline-icon symbol symbol-circle symbol-40px">
									<div class="symbol-label bg-light">
										<span class="svg-icon svg-icon-2 svg-icon-gray-500">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M11.2166 8.50002L10.5166 7.80007C10.1166 7.40007 10.1166 6.80005 10.5166 6.40005L13.4166 3.50002C15.5166 1.40002 18.9166 1.50005 20.8166 3.90005C22.5166 5.90005 22.2166 8.90007 20.3166 10.8001L17.5166 13.6C17.1166 14 16.5166 14 16.1166 13.6L15.4166 12.9C15.0166 12.5 15.0166 11.9 15.4166 11.5L18.3166 8.6C19.2166 7.7 19.1166 6.30002 18.0166 5.50002C17.2166 4.90002 16.0166 5.10007 15.3166 5.80007L12.4166 8.69997C12.2166 8.89997 11.6166 8.90002 11.2166 8.50002ZM11.2166 15.6L8.51659 18.3001C7.81659 19.0001 6.71658 19.2 5.81658 18.6C4.81658 17.9 4.71659 16.4 5.51659 15.5L8.31658 12.7C8.71658 12.3 8.71658 11.7001 8.31658 11.3001L7.6166 10.6C7.2166 10.2 6.6166 10.2 6.2166 10.6L3.6166 13.2C1.7166 15.1 1.4166 18.1 3.1166 20.1C5.0166 22.4 8.51659 22.5 10.5166 20.5L13.3166 17.7C13.7166 17.3 13.7166 16.7001 13.3166 16.3001L12.6166 15.6C12.3166 15.2 11.6166 15.2 11.2166 15.6Z" fill="currentColor" />
												<path opacity="0.3" d="M5.0166 9L2.81659 8.40002C2.31659 8.30002 2.0166 7.79995 2.1166 7.19995L2.31659 5.90002C2.41659 5.20002 3.21659 4.89995 3.81659 5.19995L6.0166 6.40002C6.4166 6.60002 6.6166 7.09998 6.5166 7.59998L6.31659 8.30005C6.11659 8.80005 5.5166 9.1 5.0166 9ZM8.41659 5.69995H8.6166C9.1166 5.69995 9.5166 5.30005 9.5166 4.80005L9.6166 3.09998C9.6166 2.49998 9.2166 2 8.5166 2H7.81659C7.21659 2 6.71659 2.59995 6.91659 3.19995L7.31659 4.90002C7.41659 5.40002 7.91659 5.69995 8.41659 5.69995ZM14.6166 18.2L15.1166 21.3C15.2166 21.8 15.7166 22.2 16.2166 22L17.6166 21.6C18.1166 21.4 18.4166 20.8 18.1166 20.3L16.7166 17.5C16.5166 17.1 16.1166 16.9 15.7166 17L15.2166 17.1C14.8166 17.3 14.5166 17.7 14.6166 18.2ZM18.4166 16.3L19.8166 17.2C20.2166 17.5 20.8166 17.3 21.0166 16.8L21.3166 15.9C21.5166 15.4 21.1166 14.8 20.5166 14.8H18.8166C18.0166 14.8 17.7166 15.9 18.4166 16.3Z" fill="currentColor" />
											</svg>
										</span>
									</div>
								</div>
								<div class="timeline-content mb-10 mt-n1">
									<div class="mb-5 pe-3">
										<a href="#" class="fs-5 fw-semibold text-gray-800 text-hover-primary mb-2">3 فایل جدید حرفه ایجکت ورودی ها:</a>
										<div class="d-flex align-items-center mt-1 fs-6">
											<div class="text-muted me-2 fs-7">ارسال شده در ساعت 10:30</div>
											<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="دی Hummer">
												<img src="assets/media/avatars/300-23.jpg" alt="img" />
											</div>
										</div>
									</div>
									<div class="overflow-auto pb-5">
										<div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">
											<div class="d-flex flex-aligns-center pe-10 pe-lg-20">
												<img alt="" class="w-30px me-3" src="assets/media/svg/files/pdf.svg" />
												<div class="ms-1 fw-semibold">
													<a href="../../demo23/dist/apps/projects/project.html" class="fs-6 text-hover-primary fw-bold">دارایی، مالیه، سرمایه گذاری </a>
													<div class="text-gray-400">1.9mb</div>
												</div>
											</div>
											<div class="d-flex flex-aligns-center pe-10 pe-lg-20">
												<img alt="../../demo23/dist/apps/projects/project.html" class="w-30px me-3" src="assets/media/svg/files/doc.svg" />
												<div class="ms-1 fw-semibold">
													<a href="#" class="fs-6 text-hover-primary fw-bold">مشتری نتایج تست</a>
													<div class="text-gray-400">18kb</div>
												</div>
											</div>
											<div class="d-flex flex-aligns-center">
												<img alt="../../demo23/dist/apps/projects/project.html" class="w-30px me-3" src="assets/media/svg/files/css.svg" />
												<div class="ms-1 fw-semibold">
													<a href="#" class="fs-6 text-hover-primary fw-bold"> گزارشات دارایی، مالیه، سرمایه گذاری</a>
													<div class="text-gray-400">20mb</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="timeline-item">
								<div class="timeline-line w-40px"></div>
								<div class="timeline-icon symbol symbol-circle symbol-40px">
									<div class="symbol-label bg-light">
										<span class="svg-icon svg-icon-2 svg-icon-gray-500">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor" />
												<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor" />
											</svg>
										</span>
									</div>
								</div>
								<div class="timeline-content mb-10 mt-n1">
									<div class="pe-3 mb-5">
										<div class="fs-5 fw-semibold mb-2">وظیفه
										<a href="#" class="text-primary fw-bold me-1">#45890</a>ادغام با
										<a href="#" class="text-primary fw-bold me-1">#45890</a>داشبورد پروژه ها:</div>
										<div class="d-flex align-items-center mt-1 fs-6">
											<div class="text-muted me-2 fs-7">آغاز شده در 4:23 بعد از ظهر توسط</div>
											<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Nina Nilson">
												<img src="assets/media/avatars/300-14.jpg" alt="img" />
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="timeline-item">
								<div class="timeline-line w-40px"></div>
								<div class="timeline-icon symbol symbol-circle symbol-40px">
									<div class="symbol-label bg-light">
										<span class="svg-icon svg-icon-2 svg-icon-gray-500">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
												<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
											</svg>
										</span>
									</div>
								</div>
								<div class="timeline-content mb-10 mt-n1">
									<div class="pe-3 mb-5">
										<div class="fs-5 fw-semibold mb-2">3 مفهوم جدید طراحی برنامه اضافه شده است:</div>
										<div class="d-flex align-items-center mt-1 fs-6">
											<div class="text-muted me-2 fs-7">ایجاد شده در 4:23 بعد از ظهر توسط</div>
											<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="اسفندcus Dotson">
												<img src="assets/media/avatars/300-2.jpg" alt="img" />
											</div>
										</div>
									</div>
									<div class="overflow-auto pb-5">
										<div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
											<div class="overlay me-10">
												<div class="overlay-wrapper">
													<img alt="img" class="rounded w-150px" src="assets/media/stock/600x400/img-29.jpg" />
												</div>
												<div class="overlay-layer bg-dark bg-opacity-10 rounded">
													<a href="#" class="btn btn-sm btn-primary btn-shadow">کاوش کنید</a>
												</div>
											</div>
											<div class="overlay me-10">
												<div class="overlay-wrapper">
													<img alt="img" class="rounded w-150px" src="assets/media/stock/600x400/img-31.jpg" />
												</div>
												<div class="overlay-layer bg-dark bg-opacity-10 rounded">
													<a href="#" class="btn btn-sm btn-primary btn-shadow">کاوش کنید</a>
												</div>
											</div>
											<div class="overlay">
												<div class="overlay-wrapper">
													<img alt="img" class="rounded w-150px" src="assets/media/stock/600x400/img-40.jpg" />
												</div>
												<div class="overlay-layer bg-dark bg-opacity-10 rounded">
													<a href="#" class="btn btn-sm btn-primary btn-shadow">کاوش کنید</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="timeline-item">
								<div class="timeline-line w-40px"></div>
								<div class="timeline-icon symbol symbol-circle symbol-40px">
									<div class="symbol-label bg-light">
										<span class="svg-icon svg-icon-2 svg-icon-gray-500">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z" fill="currentColor" />
												<path opacity="0.3" d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z" fill="currentColor" />
											</svg>
										</span>
									</div>
								</div>
								<div class="timeline-content mb-10 mt-n1">
									<div class="pe-3 mb-5">
										<div class="fs-5 fw-semibold mb-2">کیس جدید
										<a href="#" class="text-primary fw-bold me-1">#67890</a>در پروژه طراحی دیتابیس چند سکویی به شما اختصاص داده شده است</div>
										<div class="overflow-auto pb-5">
											<div class="d-flex align-items-center mt-1 fs-6">
												<div class="text-muted me-2 fs-7">اضافه شده در ساعت 4:12</div>
												<a href="#" class="text-primary fw-bold me-1">رضا علی ابادی</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="timeline-item">
								<div class="timeline-line w-40px"></div>
								<div class="timeline-icon symbol symbol-circle symbol-40px">
									<div class="symbol-label bg-light">
										<span class="svg-icon svg-icon-2 svg-icon-gray-500">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
												<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
											</svg>
										</span>
									</div>
								</div>
								<div class="timeline-content mb-10 mt-n1">
									<div class="pe-3 mb-5">
										<div class="fs-5 fw-semibold mb-2">رسید به دست شما سفارش جدید</div>
										<div class="d-flex align-items-center mt-1 fs-6">
											<div class="text-muted me-2 fs-7">در 5:05 صبح توسط</div>
											<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Robert Rich">
												<img src="assets/media/avatars/300-4.jpg" alt="img" />
											</div>
										</div>
									</div>
									<div class="overflow-auto pb-5">
										<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">
											<span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3" d="M19.0687 17.9688H11.0687C10.4687 17.9688 10.0687 18.3687 10.0687 18.9688V19.9688C10.0687 20.5687 10.4687 20.9688 11.0687 20.9688H19.0687C19.6687 20.9688 20.0687 20.5687 20.0687 19.9688V18.9688C20.0687 18.3687 19.6687 17.9688 19.0687 17.9688Z" fill="currentColor" />
													<path d="M4.06875 17.9688C3.86875 17.9688 3.66874 17.8688 3.46874 17.7688C2.96874 17.4688 2.86875 16.8688 3.16875 16.3688L6.76874 10.9688L3.16875 5.56876C2.86875 5.06876 2.96874 4.46873 3.46874 4.16873C3.96874 3.86873 4.56875 3.96878 4.86875 4.46878L8.86875 10.4688C9.06875 10.7688 9.06875 11.2688 8.86875 11.5688L4.86875 17.5688C4.66875 17.7688 4.36875 17.9688 4.06875 17.9688Z" fill="currentColor" />
												</svg>
											</span>
											<div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
												<div class="mb-3 mb-md-0 fw-semibold">
													<h4 class="text-gray-900 fw-bold">پردازش دیتابی کامل شد</h4>
													<div class="fs-6 text-gray-700 pe-7">وارد ادمین داشبورد شوید تا مطمئن شوید که یکپارچگی داده ها موفق است</div>
												</div>
												<a href="#" class="btn btn-primary px-6 align-self-center text-nowrap">پردازش</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="timeline-item">
								<div class="timeline-line w-40px"></div>
								<div class="timeline-icon symbol symbol-circle symbol-40px">
									<div class="symbol-label bg-light">
										<span class="svg-icon svg-icon-2 svg-icon-gray-500">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="currentColor" />
												<path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="currentColor" />
												<path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="currentColor" />
											</svg>
										</span>
									</div>
								</div>
								<div class="timeline-content mt-n1">
									<div class="pe-3 mb-5">
										<div class="fs-5 fw-semibold mb-2">سفارش جدید
										<a href="#" class="text-primary fw-bold me-1">#67890</a>برای پلان و برآورد بودجه قرار داده شده است</div>
										<div class="d-flex align-items-center mt-1 fs-6">
											<div class="text-muted me-2 fs-7">در ساعت 4:23 بعد از ظهر توسط</div>
											<a href="#" class="text-primary fw-bold me-1">محسن علی ابادی</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer py-5 text-center" id="kt_activities_footer">
					<a href="../../demo23/dist/pages/user-profile/activity.html" class="btn btn-bg-body text-primary">نمایش همه فعالیت ها
					<span class="svg-icon svg-icon-3 svg-icon-primary">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
							<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
						</svg>
					</span>
</a>
				</div>
			</div>
		</div>
		<div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-close="#kt_drawer_chat_close">
			<div class="card w-100 rounded-0 border-0" id="kt_drawer_chat_messenger">
				<div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
					<div class="card-title">
						<div class="d-flex justify-content-center flex-column me-3">
							<a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">احمد موسوی</a>
							<div class="mb-0 lh-1">
								<span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
								<span class="fs-7 fw-semibold text-muted">فعال</span>
							</div>
						</div>
					</div>
					<div class="card-toolbar">
						<div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_chat_close">
							<span class="svg-icon svg-icon-2">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
						</div>
					</div>
				</div>
				<div class="card-body" id="kt_drawer_chat_messenger_body">
					<div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer" data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
						<div class="d-flex justify-content-start mb-10">
							<div class="d-flex flex-column align-items-start">
								<div class="d-flex align-items-center mb-2">
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/300-25.jpg" />
									</div>
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">احمد موسوی</a>
										<span class="text-muted fs-7 mb-1">2 دقیقه</span>
									</div>
								</div>
								<div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">چقدر احتمال دارد که شرکت ما را به دوستان و خانواده خود پیشنهاد دهید؟?</div>
							</div>
						</div>
						<div class="d-flex justify-content-end mb-10">
							<div class="d-flex flex-column align-items-end">
								<div class="d-flex align-items-center mb-2">
									<div class="me-3">
										<span class="text-muted fs-7 mb-1">5 دقیقه</span>
										<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">شما</a>
									</div>
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/300-1.jpg" />
									</div>
								</div>
								<div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end" data-kt-element="message-text">سلام، ما فقط می نویسیم تا به شما اطلاع دهیم که به یک مخزن در مشترک شده اید.</div>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-10">
							<div class="d-flex flex-column align-items-start">
								<div class="d-flex align-items-center mb-2">
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/300-25.jpg" />
									</div>
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">احمد موسوی</a>
										<span class="text-muted fs-7 mb-1">1 ساعت</span>
									</div>
								</div>
								<div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">باشه، فهمیده شد!</div>
							</div>
						</div>
						<div class="d-flex justify-content-end mb-10">
							<div class="d-flex flex-column align-items-end">
								<div class="d-flex align-items-center mb-2">
									<div class="me-3">
										<span class="text-muted fs-7 mb-1">2 ساعت</span>
										<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">شما</a>
									</div>
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/300-1.jpg" />
									</div>
								</div>
								<div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end" data-kt-element="message-text">برای همه مسائل اعلان دریافت خواهید کرد، درخواست‌ها!</div>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-10">
							<div class="d-flex flex-column align-items-start">
								<div class="d-flex align-items-center mb-2">
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/300-25.jpg" />
									</div>
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">احمد موسوی</a>
										<span class="text-muted fs-7 mb-1">3 ساعت</span>
									</div>
								</div>
								<div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">شما می توانید با کلیک بر روی اینجا فوراً این مخزن را لغو تماشا کنید:
								<a href="https://keenthemes.com">Keenthemes.com</a></div>
							</div>
						</div>
						<div class="d-flex justify-content-end mb-10">
							<div class="d-flex flex-column align-items-end">
								<div class="d-flex align-items-center mb-2">
									<div class="me-3">
										<span class="text-muted fs-7 mb-1">4 ساعت</span>
										<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">شما</a>
									</div>
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/300-1.jpg" />
									</div>
								</div>
								<div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end" data-kt-element="message-text">بیشترین خرید دوره های بیزینس در این فروش!</div>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-10">
							<div class="d-flex flex-column align-items-start">
								<div class="d-flex align-items-center mb-2">
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/300-25.jpg" />
									</div>
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">احمد موسوی</a>
										<span class="text-muted fs-7 mb-1">5 ساعت</span>
									</div>
								</div>
								<div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">کمپانی BBQ برای جشن گرفتن دستاوردها و اهداف سه ماهه آخر. غذا و نوشیدنی ارائه می شود</div>
							</div>
						</div>
						<div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
							<div class="d-flex flex-column align-items-end">
								<div class="d-flex align-items-center mb-2">
									<div class="me-3">
										<span class="text-muted fs-7 mb-1">فقط</span>
										<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">شما</a>
									</div>
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/300-1.jpg" />
									</div>
								</div>
								<div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end" data-kt-element="message-text"></div>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-10 d-none" data-kt-element="template-in">
							<div class="d-flex flex-column align-items-start">
								<div class="d-flex align-items-center mb-2">
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/300-25.jpg" />
									</div>
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">احمد موسوی</a>
										<span class="text-muted fs-7 mb-1">فقط</span>
									</div>
								</div>
								<div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">Right before vacation season we have the next Bigمعامله for you.</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
					<textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input" placeholder="نوشتن پیام"></textarea>
					<div class="d-flex flex-stack">
						<div class="d-flex align-items-center me-2">
							<button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="بزودی">
								<i class="bi bi-paperclip fs-3"></i>
							</button>
							<button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="بزودی">
								<i class="bi bi-upload fs-3"></i>
							</button>
						</div>
						<button class="btn btn-primary" type="button" data-kt-element="send">ارسال</button>
					</div>
				</div>
			</div>
		</div>
		<div id="kt_shopping_cart" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="cart" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_drawer_shopping_cart_toggle" data-kt-drawer-close="#kt_drawer_shopping_cart_close">
			<div class="card card-flush w-100 rounded-0">
				<div class="card-header">
					<h3 class="card-title text-gray-900 fw-bold">سبد خرید</h3>
					<div class="card-toolbar">
						<div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_shopping_cart_close">
							<span class="svg-icon svg-icon-2">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
						</div>
					</div>
				</div>
				<div class="card-body hover-scroll-overlay-y h-400px pt-5">
					<div class="d-flex flex-stack">
						<div class="d-flex flex-column me-3">
							<div class="mb-3">
								<a href="../../demo23/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">Iblender</a>
								<span class="text-gray-400 fw-semibold d-block">The best kitchen gadget in 2022</span>
							</div>
							<div class="d-flex align-items-center">
								<span class="fw-bold text-gray-800 fs-5">$ 350</span>
								<span class="text-muted mx-2">for</span>
								<span class="fw-bold text-gray-800 fs-5 me-3">5</span>
								<a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
									<span class="svg-icon svg-icon-4">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
										</svg>
									</span>
								</a>
								<a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
									<span class="svg-icon svg-icon-4">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
											<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
										</svg>
									</span>
								</a>
							</div>
						</div>
						<div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
							<img src="assets/media/stock/600x400/img-1.jpg" alt="" />
						</div>
					</div>
					<div class="separator separator-dashed my-6"></div>
					<div class="d-flex flex-stack">
						<div class="d-flex flex-column me-3">
							<div class="mb-3">
								<a href="../../demo23/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">SmartCleaner</a>
								<span class="text-gray-400 fw-semibold d-block">Smart tool for cooking</span>
							</div>
							<div class="d-flex align-items-center">
								<span class="fw-bold text-gray-800 fs-5">$ 650</span>
								<span class="text-muted mx-2">for</span>
								<span class="fw-bold text-gray-800 fs-5 me-3">4</span>
								<a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
									<span class="svg-icon svg-icon-4">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
										</svg>
									</span>
								</a>
								<a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
									<span class="svg-icon svg-icon-4">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
											<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
										</svg>
									</span>
								</a>
							</div>
						</div>
						<div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
							<img src="assets/media/stock/600x400/img-3.jpg" alt="" />
						</div>
					</div>
					<div class="separator separator-dashed my-6"></div>
					<div class="d-flex flex-stack">
						<div class="d-flex flex-column me-3">
							<div class="mb-3">
								<a href="../../demo23/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">CameraMaxr</a>
								<span class="text-gray-400 fw-semibold d-block">حرفه ایfessional camera for edge</span>
							</div>
							<div class="d-flex align-items-center">
								<span class="fw-bold text-gray-800 fs-5">$ 150</span>
								<span class="text-muted mx-2">for</span>
								<span class="fw-bold text-gray-800 fs-5 me-3">3</span>
								<a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
									<span class="svg-icon svg-icon-4">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
										</svg>
									</span>
								</a>
								<a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
									<span class="svg-icon svg-icon-4">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
											<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
										</svg>
									</span>
								</a>
							</div>
						</div>
						<div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
							<img src="assets/media/stock/600x400/img-8.jpg" alt="" />
						</div>
					</div>
					<div class="separator separator-dashed my-6"></div>
					<div class="d-flex flex-stack">
						<div class="d-flex flex-column me-3">
							<div class="mb-3">
								<a href="../../demo23/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">$D پرینتer</a>
								<span class="text-gray-400 fw-semibold d-block">Manfactoring unique objekts</span>
							</div>
							<div class="d-flex align-items-center">
								<span class="fw-bold text-gray-800 fs-5">$ 1450</span>
								<span class="text-muted mx-2">for</span>
								<span class="fw-bold text-gray-800 fs-5 me-3">7</span>
								<a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
									<span class="svg-icon svg-icon-4">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
										</svg>
									</span>
								</a>
								<a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
									<span class="svg-icon svg-icon-4">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
											<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
										</svg>
									</span>
								</a>
							</div>
						</div>
						<div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
							<img src="assets/media/stock/600x400/img-26.jpg" alt="" />
						</div>
					</div>
					<div class="separator separator-dashed my-6"></div>
					<div class="d-flex flex-stack">
						<div class="d-flex flex-column me-3">
							<div class="mb-3">
								<a href="../../demo23/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">MotionWire</a>
								<span class="text-gray-400 fw-semibold d-block">Perfect animation tool</span>
							</div>
							<div class="d-flex align-items-center">
								<span class="fw-bold text-gray-800 fs-5">$ 650</span>
								<span class="text-muted mx-2">for</span>
								<span class="fw-bold text-gray-800 fs-5 me-3">7</span>
								<a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
									<span class="svg-icon svg-icon-4">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
										</svg>
									</span>
								</a>
								<a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
									<span class="svg-icon svg-icon-4">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
											<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
										</svg>
									</span>
								</a>
							</div>
						</div>
						<div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
							<img src="assets/media/stock/600x400/img-21.jpg" alt="" />
						</div>
					</div>
					<div class="separator separator-dashed my-6"></div>
					<div class="d-flex flex-stack">
						<div class="d-flex flex-column me-3">
							<div class="mb-3">
								<a href="../../demo23/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">Samsung</a>
								<span class="text-gray-400 fw-semibold d-block">پروفایل info,timeline etc</span>
							</div>
							<div class="d-flex align-items-center">
								<span class="fw-bold text-gray-800 fs-5">$ 720</span>
								<span class="text-muted mx-2">for</span>
								<span class="fw-bold text-gray-800 fs-5 me-3">6</span>
								<a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
									<span class="svg-icon svg-icon-4">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
										</svg>
									</span>
								</a>
								<a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
									<span class="svg-icon svg-icon-4">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
											<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
										</svg>
									</span>
								</a>
							</div>
						</div>
						<div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
							<img src="assets/media/stock/600x400/img-34.jpg" alt="" />
						</div>
					</div>
					<div class="separator separator-dashed my-6"></div>
					<div class="d-flex flex-stack">
						<div class="d-flex flex-column me-3">
							<div class="mb-3">
								<a href="../../demo23/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">$D پرینتer</a>
								<span class="text-gray-400 fw-semibold d-block">Manfactoring unique objekts</span>
							</div>
							<div class="d-flex align-items-center">
								<span class="fw-bold text-gray-800 fs-5">$ 430</span>
								<span class="text-muted mx-2">for</span>
								<span class="fw-bold text-gray-800 fs-5 me-3">8</span>
								<a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
									<span class="svg-icon svg-icon-4">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
										</svg>
									</span>
								</a>
								<a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
									<span class="svg-icon svg-icon-4">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
											<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
										</svg>
									</span>
								</a>
							</div>
						</div>
						<div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
							<img src="assets/media/stock/600x400/img-27.jpg" alt="" />
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="d-flex flex-stack">
						<span class="fw-bold text-gray-600">کل</span>
						<span class="text-gray-800 fw-bolder fs-5">$ 1840.00</span>
					</div>
					<div class="d-flex flex-stack">
						<span class="fw-bold text-gray-600">Sub total</span>
						<span class="text-primary fw-bolder fs-5">$ 246.35</span>
					</div>
					<div class="d-flex justify-content-end mt-9">
						<a href="#" class="btn btn-primary d-flex justify-content-end">Pleace Order</a>
					</div>
				</div>
			</div>
		</div>
		<div id="kt_engage_demos" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="explore" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'350px', 'lg': '475px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_engage_demos_toggle" data-kt-drawer-close="#kt_engage_demos_close">
			<div class="card shadow-none rounded-0 w-100">
				<div class="card-header" id="kt_engage_demos_header">
					<h3 class="card-title fw-bold text-gray-700">دموها</h3>
					<div class="card-toolbar">
						<button type="button" class="btn btn-sm btn-icon btn-active-color-primary h-40px w-40px me-n6" id="kt_engage_demos_close">
							<span class="svg-icon svg-icon-2">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
						</button>
					</div>
				</div>
				<div class="card-body" id="kt_engage_demos_body">
					<div id="kt_explore_scroll" class="scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_engage_demos_body" data-kt-scroll-dependencies="#kt_engage_demos_header" data-kt-scroll-offset="5px">
						<div class="mb-0">
							<div class="mb-7">
								<div class="d-flex flex-stack">
									<h3 class="mb-0">مترونیک لاینسس شده</h3>
									<a href="https://themeforest.net/licenses/stوard" class="fw-semibold" target="_blank">لاینسس شده سوالات متداول</a>
								</div>
							</div>
							<div class="rounded border border-dashed border-gray-300 py-4 px-6 mb-5">
								<div class="d-flex flex-stack">
									<div class="d-flex flex-column">
										<div class="d-flex align-items-center mb-1">
											<div class="fs-6 fw-semibold text-gray-800 fw-semibold mb-0 me-1">منظم لاینسس شده</div>
											<i class="text-gray-400 fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="popover" data-bs-custom-class="popover-inverse" data-bs-trigger="hover" data-bs-placement="top" data-bs-content="Use, by you or one client in a single end product which end کاربران are not charged for"></i>
										</div>
										<div class="fs-7 text-muted">برای محصول نهایی که توسط شما یا یک مشتری استفاده می شود</div>
									</div>
									<div class="text-nowrap">
										<span class="text-muted fs-7 fw-semibold me-n1">$</span>
										<span class="text-dark fs-1 fw-bold">49</span>
									</div>
								</div>
							</div>
							<div class="rounded border border-dashed border-gray-300 py-4 px-6 mb-5">
								<div class="d-flex flex-stack">
									<div class="d-flex flex-column">
										<div class="d-flex align-items-center mb-1">
											<div class="fs-6 fw-semibold text-gray-800 fw-semibold mb-0 me-1">تمدید شده لاینسس شده</div>
											<i class="text-gray-400 fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="popover" data-bs-custom-class="popover-inverse" data-bs-trigger="hover" data-bs-placement="top" data-bs-content="Use, by you or one client, in a single end product which end کاربران can be charged for."></i>
										</div>
										<div class="fs-7 text-muted">برای یک برنامه ساس با کاربران پرداخت</div>
									</div>
									<div class="text-nowrap">
										<span class="text-muted fs-7 fw-semibold me-n1">$</span>
										<span class="text-dark fs-1 fw-bold">969</span>
									</div>
								</div>
							</div>
							<div class="rounded border border-dashed border-gray-300 py-4 px-6 mb-5">
								<div class="d-flex flex-stack">
									<div class="d-flex flex-column">
										<div class="d-flex align-items-center mb-1">
											<div class="fs-6 fw-semibold text-gray-800 fw-semibold mb-0 me-1">سفارشی لاینسس شده</div>
										</div>
										<div class="fs-7 text-muted">برای پیشنهادات مجوز سفارشی با ما تماس بگیرید.</div>
									</div>
									<div class="text-nowrap">
										<a href="https://keenthemes.com/contact" class="btn btn-sm btn-success" target="_blank">تماس با ما</a>
									</div>
								</div>
							</div>
							<a href="https://www.rtl-theme.com/metronic-admin-html-template/" class="btn btn-primary fw-bold mb-15 w-100">خرید</a>
							<div class="mb-0">
								<h3 class="fw-bold text-center mb-6">30 دموهای مترونیک</h3>
								<div class="row g-5">
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo1/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo1/index.html" class="btn btn-sm btn-success shadow">مترونیک اصل و نسبal</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo2/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo2/index.html" class="btn btn-sm btn-success shadow">ساس اپلیکیشن</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo6/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo6/index.html" class="btn btn-sm btn-success shadow">سیستم پوز</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo3/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo3/index.html" class="btn btn-sm btn-success shadow">جدید Trend</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo8/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo8/index.html" class="btn btn-sm btn-success shadow">آنالیتیکس اپلیکیشن</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo10/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo10/index.html" class="btn btn-sm btn-success shadow">پروژه Grid</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo11/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo11/index.html" class="btn btn-sm btn-success shadow">دارایی، مالیه، سرمایه گذاری Planner</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo4/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo4/index.html" class="btn btn-sm btn-success shadow">Jobs Site</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo27/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo27/index.html" class="btn btn-sm btn-success shadow">Databox داشبورد</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo20/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo20/index.html" class="btn btn-sm btn-success shadow">سیستم مدیریت محتوا Software</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo25/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo25/index.html" class="btn btn-sm btn-success shadow">کاربر Guiding اپلیکیشن</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo30/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo30/index.html" class="btn btn-sm btn-success shadow">فروش Tracking اپلیکیشن</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-success rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo23/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo23/index.html" class="btn btn-sm btn-success shadow">Member داشبورد</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo29/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo29/index.html" class="btn btn-sm btn-success shadow">پروژه Workspace</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo14/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo14/index.html" class="btn btn-sm btn-success shadow">پروژه Workplace</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo24/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo24/index.html" class="btn btn-sm btn-success shadow">کمکdesk اپلیکیشن</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo26/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo26/index.html" class="btn btn-sm btn-success shadow">Planable اپلیکیشن</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo7/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo7/index.html" class="btn btn-sm btn-success shadow">داشبورد سیستم مدیریت محتوا </a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo22/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo22/index.html" class="btn btn-sm btn-success shadow">Media Publisher</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo28/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo28/index.html" class="btn btn-sm btn-success shadow">تجارت الکترونیک اپلیکیشن</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo19/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo19/index.html" class="btn btn-sm btn-success shadow">گزارشات Panel</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo9/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo9/index.html" class="btn btn-sm btn-success shadow">فروش مدیریت</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo13/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo13/index.html" class="btn btn-sm btn-success shadow">کلاسیک داشبورد</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo16/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo16/index.html" class="btn btn-sm btn-success shadow">پادکست اپلیکیشن</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo18/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo18/index.html" class="btn btn-sm btn-success shadow">Goal Tracking</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo21/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo21/index.html" class="btn btn-sm btn-success shadow">Monochrome اپلیکیشن</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo12/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo12/index.html" class="btn btn-sm btn-success shadow">Data Analyzer</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo17/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo17/index.html" class="btn btn-sm btn-success shadow">رویدادها Scheduler</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo15/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo15/index.html" class="btn btn-sm btn-success shadow">کریپتو Planner</a>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
											<div class="overlay-wrapper">
												<img src="assets/media/preview/demos/demo5/light-ltr.png" alt="demo" class="w-100" />
											</div>
											<div class="overlay-layer bg-dark bg-opacity-10">
												<a href="Https://preview.keenthemes.com/metronic8/demo5/index.html" class="btn btn-sm btn-success shadow">انجمن پشتیبانی</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="engage-toolbar d-flex position-fixed px-5 fw-bold zindex-2 top-50 end-0 transform-90 mt-5 mt-lg-20 gap-2">
			<button id="kt_engage_demos_toggle" class="engage-demos-toggle engage-btn btn shadow-sm fs-6 px-4 rounded-top-0" title="30 دموی دیگر را بررسی کنید" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-dismiss="click" data-bs-trigger="hover">
				<span id="kt_engage_demos_label">دموها</span>
			</button>
		</div>
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<span class="svg-icon">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
				</svg>
			</span>
		</div>
		<div class="modal fade" id="kt_modal_upgrade_plan" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content rounded">
					<div class="modal-header justify-content-end border-0 pb-0">
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
						</div>
					</div>
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<div class="mb-13 text-center">
							<h1 class="mb-3">یک برنامه را ارتقا کنید</h1>
							<div class="text-muted fw-semibold fs-5">اگر به اطلاعات لازم دارید ، لطفاً بررسی کنید
							<a href="#" class="link-primary fw-bold">راهنمای قیمت گذاری</a>.</div>
						</div>
						<div class="d-flex flex-column">
							<div class="nav-group nav-group-outline mx-auto" data-kt-buttons="true">
								<button class="btn btn-color-gray-400 btn-active btn-active-secondary px-6 py-3 me-2 active" data-kt-plan="month">ماهانه</button>
								<button class="btn btn-color-gray-400 btn-active btn-active-secondary px-6 py-3" data-kt-plan="annual">سالانه</button>
							</div>
							<div class="row mt-10">
								<div class="col-lg-6 mb-10 mb-lg-0">
									<div class="nav flex-column">
										<label class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 active mb-6" data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_startup">
											<div class="d-flex align-items-center me-2">
												<div class="form-check form-check-custom form-check-solid form-check-success flex-shrink-0 me-6">
													<input class="form-check-input" type="radio" name="plan" checked="checked" value="startup" />
												</div>
												<div class="flex-grow-1">
													<div class="d-flex align-items-center fs-2 fw-bold flex-wrap">استارت آپ</div>
													<div class="fw-semibold opacity-75">برای استارت آپ ها</div>
												</div>
											</div>
											<div class="ms-5">
												<span class="mb-2">$</span>
												<span class="fs-3x fw-bold" data-kt-plan-price-month="39" data-kt-plan-price-annual="399">39</span>
												<span class="fs-7 opacity-50">/
												<span data-kt-element="period">دوشنبه</span></span>
											</div>
										</label>
										<label class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 mb-6" data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_advanced">
											<div class="d-flex align-items-center me-2">
												<div class="form-check form-check-custom form-check-solid form-check-success flex-shrink-0 me-6">
													<input class="form-check-input" type="radio" name="plan" value="advanced" />
												</div>
												<div class="flex-grow-1">
													<div class="d-flex align-items-center fs-2 fw-bold flex-wrap">پیشرفته</div>
													<div class="fw-semibold opacity-75">برتر برای 100+ تیم اندازه</div>
												</div>
											</div>
											<div class="ms-5">
												<span class="mb-2">$</span>
												<span class="fs-3x fw-bold" data-kt-plan-price-month="339" data-kt-plan-price-annual="3399">339</span>
												<span class="fs-7 opacity-50">/
												<span data-kt-element="period">دوشنبه</span></span>
											</div>
										</label>
										<label class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 mb-6" data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_enterprise">
											<div class="d-flex align-items-center me-2">
												<div class="form-check form-check-custom form-check-solid form-check-success flex-shrink-0 me-6">
													<input class="form-check-input" type="radio" name="plan" value="enterprise" />
												</div>
												<div class="flex-grow-1">
													<div class="d-flex align-items-center fs-2 fw-bold flex-wrap">شرکت، پروژه
													<span class="badge badge-light-success ms-2 py-2 px-3 fs-7">محبوب</span></div>
													<div class="fw-semibold opacity-75">مقدار برتر برای 1000+ تیم</div>
												</div>
											</div>
											<div class="ms-5">
												<span class="mb-2">$</span>
												<span class="fs-3x fw-bold" data-kt-plan-price-month="999" data-kt-plan-price-annual="9999">999</span>
												<span class="fs-7 opacity-50">/
												<span data-kt-element="period">دوشنبه</span></span>
											</div>
										</label>
										<label class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 mb-6" data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_custom">
											<div class="d-flex align-items-center me-2">
												<div class="form-check form-check-custom form-check-solid form-check-success flex-shrink-0 me-6">
													<input class="form-check-input" type="radio" name="plan" value="custom" />
												</div>
												<div class="flex-grow-1">
													<div class="d-flex align-items-center fs-2 fw-bold flex-wrap">سفارشی</div>
													<div class="fw-semibold opacity-75">دوباره مجوز سفارشی را دوباره تهیه کنید</div>
												</div>
											</div>
											<div class="ms-5">
												<a href="#" class="btn btn-sm btn-success">تماس با ما</a>
											</div>
										</label>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="tab-content rounded h-100 bg-light p-10">
										<div class="tab-pane fade show active" id="kt_upgrade_plan_startup">
											<div class="pb-5">
												<h2 class="fw-bold text-dark">برنامه ی استارت اپ شما چیست؟?</h2>
												<div class="text-muted fw-semibold">بهینه برای اندازه 10+ تیم استارت آپ</div>
											</div>
											<div class="pt-1">
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">حداکثر 10 کاربر فعال</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">حداکثر 30 ادغام پروژه</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">ماژول تجزیه و تحلیل</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-muted flex-grow-1">ماژول دارایی ، مالیه ، سرمایه گذاری</span>
													<span class="svg-icon svg-icon-1">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor" />
															<rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-muted flex-grow-1">اکانتینگ ماژول</span>
													<span class="svg-icon svg-icon-1">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor" />
															<rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-muted flex-grow-1">بستر شبکه</span>
													<span class="svg-icon svg-icon-1">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor" />
															<rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center">
													<span class="fw-semibold fs-5 text-muted flex-grow-1">فضای نامحدود ابر</span>
													<span class="svg-icon svg-icon-1">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor" />
															<rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor" />
														</svg>
													</span>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="kt_upgrade_plan_advanced">
											<div class="pb-5">
												<h2 class="fw-bold text-dark">برنامه ی استارت اپ شما چیست؟?</h2>
												<div class="text-muted fw-semibold">بهینه برای اندازه 100+ تیم کمپانی</div>
											</div>
											<div class="pt-1">
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">حداکثر 10 کاربر فعال</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">حداکثر 30 ادغام پروژه</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">ماژول تجزیه و تحلیل</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">ماژول دارایی ، مالیه ، سرمایه گذاری</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">اکانتینگ ماژول</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-muted flex-grow-1">بستر شبکه</span>
													<span class="svg-icon svg-icon-1">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor" />
															<rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center">
													<span class="fw-semibold fs-5 text-muted flex-grow-1">فضای نامحدود ابر</span>
													<span class="svg-icon svg-icon-1">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor" />
															<rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor" />
														</svg>
													</span>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="kt_upgrade_plan_enterprise">
											<div class="pb-5">
												<h2 class="fw-bold text-dark">برنامه ی استارت اپ شما چیست؟?</h2>
												<div class="text-muted fw-semibold">بهینه برای 1000+ تیم سازمانی</div>
											</div>
											<div class="pt-1">
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">حداکثر 10 کاربر فعال</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">حداکثر 30 ادغام پروژه</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">ماژول تجزیه و تحلیل</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">ماژول دارایی ، مالیه ، سرمایه گذاری</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">اکانتینگ ماژول</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">بستر شبکه</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">فضای نامحدود ابر</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="kt_upgrade_plan_custom">
											<div class="pb-5">
												<h2 class="fw-bold text-dark">برنامه ی استارت اپ شما چیست؟?</h2>
												<div class="text-muted fw-semibold">Optimal for corporations</div>
											</div>
											<div class="pt-1">
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">نامحدود کاربران</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">نامحدود پروژه Integrations</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">ماژول تجزیه و تحلیل</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">ماژول دارایی ، مالیه ، سرمایه گذاری</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">اکانتینگ ماژول</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center mb-7">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">بستر شبکه</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
												<div class="d-flex align-items-center">
													<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">فضای نامحدود ابر</span>
													<span class="svg-icon svg-icon-1 svg-icon-success">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
															<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
														</svg>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">انصراف</button>
							<button type="submit" class="btn btn-primary" id="kt_modal_upgrade_plan_btn">
								<span class="indicator-label">ارتقا طرح</span>
								<span class="indicator-progress">لطفا صبر کنید...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="kt_modal_users_search" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered mw-650px">
				<div class="modal-content">
					<div class="modal-header pb-0 border-0 justify-content-end">
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
						</div>
					</div>
					<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
						<div class="text-center mb-13">
							<h1 class="mb-3">جستجو کاربران</h1>
							<div class="text-muted fw-semibold fs-5">همکاران را به حرفه خود دعوت کنید</div>
						</div>
						<div id="kt_modal_users_search_hوler" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="inline">
							<form data-kt-search-element="form" class="w-100 position-relative mb-5" autocomplete="off">
								<input type="hidden" />
								<span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
										<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
									</svg>
								</span>
								<input type="text" class="form-control form-control-lg form-control-solid px-15" name="search" value="" placeholder="با نام کاربری ، نام کامل یا ایمیل جستجو کنید ..." data-kt-search-element="input" />
								<span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
									<span class="spinner-border h-15px w-15px align-middle text-muted"></span>
								</span>
								<span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none" data-kt-search-element="clear">
									<span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
											<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
										</svg>
									</span>
								</span>
							</form>
							<div class="py-5">
								<div data-kt-search-element="suggestions">
									<h3 class="fw-semibold mb-5">اخیراً جستجو شده:</h3>
									<div class="mh-375px scroll-y me-n7 pe-7">
										<a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
											<div class="symbol symbol-35px symbol-circle me-5">
												<img alt="Pic" src="assets/media/avatars/300-6.jpg" />
											</div>
											<div class="fw-semibold">
												<span class="fs-6 text-gray-800 me-2">مرادی نیا</span>
												<span class="badge badge-light">کارگردان هنری</span>
											</div>
										</a>
										<a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
											<div class="symbol symbol-35px symbol-circle me-5">
												<span class="symbol-label bg-light-danger text-danger fw-semibold">M</span>
											</div>
											<div class="fw-semibold">
												<span class="fs-6 text-gray-800 me-2">میلاد مرادی</span>
												<span class="badge badge-light">بازاریابی تحلیلی</span>
											</div>
										</a>
										<a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
											<div class="symbol symbol-35px symbol-circle me-5">
												<img alt="Pic" src="assets/media/avatars/300-1.jpg" />
											</div>
											<div class="fw-semibold">
												<span class="fs-6 text-gray-800 me-2">جلالی</span>
												<span class="badge badge-light">مهندس نرم افزار</span>
											</div>
										</a>
										<a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
											<div class="symbol symbol-35px symbol-circle me-5">
												<img alt="Pic" src="assets/media/avatars/300-5.jpg" />
											</div>
											<div class="fw-semibold">
												<span class="fs-6 text-gray-800 me-2">محسن برومند</span>
												<span class="badge badge-light">توسعه دهنده وب</span>
											</div>
										</a>
										<a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
											<div class="symbol symbol-35px symbol-circle me-5">
												<img alt="Pic" src="assets/media/avatars/300-25.jpg" />
											</div>
											<div class="fw-semibold">
												<span class="fs-6 text-gray-800 me-2">احمد موسوی</span>
												<span class="badge badge-light">طراح یو ای و یوایکس</span>
											</div>
										</a>
									</div>
								</div>
								<div data-kt-search-element="results" class="d-none">
									<div class="mh-375px scroll-y me-n7 pe-7">
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="0">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='0']" value="0" />
												</label>
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-6.jpg" />
												</div>
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">مرادی نیا</a>
													<div class="fw-semibold text-muted">smith@kpmg.com</div>
												</div>
											</div>
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">مهمان</option>
													<option value="2" selected="selected">مدیر</option>
													<option value="3">متفرقه</option>
												</select>
											</div>
										</div>
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="1">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='1']" value="1" />
												</label>
												<div class="symbol symbol-35px symbol-circle">
													<span class="symbol-label bg-light-danger text-danger fw-semibold">M</span>
												</div>
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">میلاد مرادی</a>
													<div class="fw-semibold text-muted">melody@altbox.com</div>
												</div>
											</div>
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1" selected="selected">مهمان</option>
													<option value="2">مدیر</option>
													<option value="3">متفرقه</option>
												</select>
											</div>
										</div>
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="2">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='2']" value="2" />
												</label>
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-1.jpg" />
												</div>
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">جلالی</a>
													<div class="fw-semibold text-muted">max@kt.com</div>
												</div>
											</div>
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">مهمان</option>
													<option value="2">مدیر</option>
													<option value="3" selected="selected">متفرقه </option>
												</select>
											</div>
										</div>
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="3">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='3']" value="3" />
												</label>
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-5.jpg" />
												</div>
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">محسن برومند</a>
													<div class="fw-semibold text-muted">sean@dellito.com</div>
												</div>
											</div>
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">مهمان</option>
													<option value="2" selected="selected">مدیر</option>
													<option value="3">متفرقه</option>
												</select>
											</div>
										</div>
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="4">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='4']" value="4" />
												</label>
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-25.jpg" />
												</div>
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">احمد موسوی</a>
													<div class="fw-semibold text-muted">brian@exchange.com</div>
												</div>
											</div>
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">مهمان</option>
													<option value="2">مدیر</option>
													<option value="3" selected="selected">متفرقه </option>
												</select>
											</div>
										</div>
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="5">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='5']" value="5" />
												</label>
												<div class="symbol symbol-35px symbol-circle">
													<span class="symbol-label bg-light-warning text-warning fw-semibold">C</span>
												</div>
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">میکائیل کرمانی</a>
													<div class="fw-semibold text-muted">mik@pex.com</div>
												</div>
											</div>
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">مهمان</option>
													<option value="2" selected="selected">مدیر</option>
													<option value="3">متفرقه</option>
												</select>
											</div>
										</div>
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="6">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='6']" value="6" />
												</label>
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-9.jpg" />
												</div>
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">محمد رصایی</a>
													<div class="fw-semibold text-muted">f.mit@kpmg.com</div>
												</div>
											</div>
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">مهمان</option>
													<option value="2">مدیر</option>
													<option value="3" selected="selected">متفرقه </option>
												</select>
											</div>
										</div>
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="7">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='7']" value="7" />
												</label>
												<div class="symbol symbol-35px symbol-circle">
													<span class="symbol-label bg-light-danger text-danger fw-semibold">O</span>
												</div>
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">امید وحیدی</a>
													<div class="fw-semibold text-muted">olivia@corpmail.com</div>
												</div>
											</div>
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">مهمان</option>
													<option value="2" selected="selected">مدیر</option>
													<option value="3">متفرقه</option>
												</select>
											</div>
										</div>
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="8">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='8']" value="8" />
												</label>
												<div class="symbol symbol-35px symbol-circle">
													<span class="symbol-label bg-light-primary text-primary fw-semibold">N</span>
												</div>
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">محسن برومند</a>
													<div class="fw-semibold text-muted">owen.neil@gmail.com</div>
												</div>
											</div>
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1" selected="selected">مهمان</option>
													<option value="2">مدیر</option>
													<option value="3">متفرقه</option>
												</select>
											</div>
										</div>
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="9">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='9']" value="9" />
												</label>
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-23.jpg" />
												</div>
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">علی کاربر</a>
													<div class="fw-semibold text-muted">dam@consilting.com</div>
												</div>
											</div>
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">مهمان</option>
													<option value="2">مدیر</option>
													<option value="3" selected="selected">متفرقه </option>
												</select>
											</div>
										</div>
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="10">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='10']" value="10" />
												</label>
												<div class="symbol symbol-35px symbol-circle">
													<span class="symbol-label bg-light-danger text-danger fw-semibold">E</span>
												</div>
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">الهام بارانی</a>
													<div class="fw-semibold text-muted">emma@intenso.com</div>
												</div>
											</div>
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">مهمان</option>
													<option value="2" selected="selected">مدیر</option>
													<option value="3">متفرقه</option>
												</select>
											</div>
										</div>
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="11">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='11']" value="11" />
												</label>
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-12.jpg" />
												</div>
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">آنا کوهی</a>
													<div class="fw-semibold text-muted">ana.cf@limtel.com</div>
												</div>
											</div>
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1" selected="selected">مهمان</option>
													<option value="2">مدیر</option>
													<option value="3">متفرقه</option>
												</select>
											</div>
										</div>
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="12">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='12']" value="12" />
												</label>
												<div class="symbol symbol-35px symbol-circle">
													<span class="symbol-label bg-light-info text-info fw-semibold">A</span>
												</div>
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">رابرت دو</a>
													<div class="fw-semibold text-muted">robert@benko.com</div>
												</div>
											</div>
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">مهمان</option>
													<option value="2">مدیر</option>
													<option value="3" selected="selected">متفرقه </option>
												</select>
											</div>
										</div>
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="13">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='13']" value="13" />
												</label>
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-13.jpg" />
												</div>
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">جواد مولای</a>
													<div class="fw-semibold text-muted">miller@mapple.com</div>
												</div>
											</div>
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">مهمان</option>
													<option value="2">مدیر</option>
													<option value="3" selected="selected">متفرقه </option>
												</select>
											</div>
										</div>
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="14">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='14']" value="14" />
												</label>
												<div class="symbol symbol-35px symbol-circle">
													<span class="symbol-label bg-light-success text-success fw-semibold">L</span>
												</div>
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">لقمان کامرانی</a>
													<div class="fw-semibold text-muted">lucy.m@fentech.com</div>
												</div>
											</div>
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">مهمان</option>
													<option value="2" selected="selected">مدیر</option>
													<option value="3">متفرقه</option>
												</select>
											</div>
										</div>
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="15">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='15']" value="15" />
												</label>
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-21.jpg" />
												</div>
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">احسان ورزقانی</a>
													<div class="fw-semibold text-muted">ethan@loop.com.au</div>
												</div>
											</div>
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1" selected="selected">مهمان</option>
													<option value="2">مدیر</option>
													<option value="3">متفرقه</option>
												</select>
											</div>
										</div>
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="16">
											<div class="d-flex align-items-center">
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='16']" value="16" />
												</label>
												<div class="symbol symbol-35px symbol-circle">
													<span class="symbol-label bg-light-success text-success fw-semibold">L</span>
												</div>
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">لقمان کامرانی</a>
													<div class="fw-semibold text-muted">lucy.m@fentech.com</div>
												</div>
											</div>
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">مهمان</option>
													<option value="2">مدیر</option>
													<option value="3" selected="selected">متفرقه </option>
												</select>
											</div>
										</div>
									</div>
									<div class="d-flex flex-center mt-15">
										<button type="reset" id="kt_modal_users_search_reset" data-bs-dismiss="modal" class="btn btn-active-light me-3">انصراف</button>
										<button type="submit" id="kt_modal_users_search_submit" class="btn btn-primary">کاربران انتخاب شده را اضافه کنید</button>
									</div>
								</div>
								<div data-kt-search-element="empty" class="text-center d-none">
									<div class="fw-semibold py-10">
										<div class="text-gray-600 fs-3 mb-2">هیچ کاربری پیدا نشد</div>
										<div class="text-muted fs-6">Try to search by username, full name or email...</div>
									</div>
									<div class="text-center px-5">
										<img src="assets/media/illustrations/sketchy-1/1.png" alt="" class="w-100 h-200px h-sm-325px" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="kt_modal_invite_friends" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog mw-650px">
				<div class="modal-content">
					<div class="modal-header pb-0 border-0 justify-content-end">
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
						</div>
					</div>
					<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
						<div class="text-center mb-13">
							<h1 class="mb-3">دعوت از دوستان</h1>
							<div class="text-muted fw-semibold fs-5">اگر به اطلاعات بیشتری نیاز دارید ، لطفاً این مورد را بررسی کنید
							<a href="#" class="link-primary fw-bold">صفحه سوالات متداول</a>.</div>
						</div>
						<div class="btn btn-light-primary fw-bold w-100 mb-8">
						<img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />دعوت جی میل تماس با ما</div>
						<div class="separator d-flex flex-center mb-8">
							<span class="text-uppercase bg-body fs-7 fw-semibold text-muted px-3">یا</span>
						</div>
						<textarea class="form-control form-control-solid mb-8" rows="3" placeholder="ایمیل ها را اینجا تایپ کنید یا"></textarea>
						<div class="mb-10">
							<div class="fs-6 fw-semibold mb-2">دعوت های شما</div>
							<div class="mh-300px scroll-y me-n7 pe-7">
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<div class="d-flex align-items-center">
										<div class="symbol symbol-35px symbol-circle">
											<img alt="Pic" src="assets/media/avatars/300-6.jpg" />
										</div>
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">مرادی نیا</a>
											<div class="fw-semibold text-muted">smith@kpmg.com</div>
										</div>
									</div>
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">مهمان</option>
											<option value="2" selected="selected">مدیر</option>
											<option value="3">متفرقه</option>
										</select>
									</div>
								</div>
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<div class="d-flex align-items-center">
										<div class="symbol symbol-35px symbol-circle">
											<span class="symbol-label bg-light-danger text-danger fw-semibold">M</span>
										</div>
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">میلاد مرادی</a>
											<div class="fw-semibold text-muted">melody@altbox.com</div>
										</div>
									</div>
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1" selected="selected">مهمان</option>
											<option value="2">مدیر</option>
											<option value="3">متفرقه</option>
										</select>
									</div>
								</div>
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<div class="d-flex align-items-center">
										<div class="symbol symbol-35px symbol-circle">
											<img alt="Pic" src="assets/media/avatars/300-1.jpg" />
										</div>
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">جلالی</a>
											<div class="fw-semibold text-muted">max@kt.com</div>
										</div>
									</div>
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">مهمان</option>
											<option value="2">مدیر</option>
											<option value="3" selected="selected">متفرقه </option>
										</select>
									</div>
								</div>
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<div class="d-flex align-items-center">
										<div class="symbol symbol-35px symbol-circle">
											<img alt="Pic" src="assets/media/avatars/300-5.jpg" />
										</div>
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">محسن برومند</a>
											<div class="fw-semibold text-muted">sean@dellito.com</div>
										</div>
									</div>
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">مهمان</option>
											<option value="2" selected="selected">مدیر</option>
											<option value="3">متفرقه</option>
										</select>
									</div>
								</div>
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<div class="d-flex align-items-center">
										<div class="symbol symbol-35px symbol-circle">
											<img alt="Pic" src="assets/media/avatars/300-25.jpg" />
										</div>
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">احمد موسوی</a>
											<div class="fw-semibold text-muted">brian@exchange.com</div>
										</div>
									</div>
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">مهمان</option>
											<option value="2">مدیر</option>
											<option value="3" selected="selected">متفرقه </option>
										</select>
									</div>
								</div>
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<div class="d-flex align-items-center">
										<div class="symbol symbol-35px symbol-circle">
											<span class="symbol-label bg-light-warning text-warning fw-semibold">C</span>
										</div>
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">میکائیل کرمانی</a>
											<div class="fw-semibold text-muted">mik@pex.com</div>
										</div>
									</div>
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">مهمان</option>
											<option value="2" selected="selected">مدیر</option>
											<option value="3">متفرقه</option>
										</select>
									</div>
								</div>
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<div class="d-flex align-items-center">
										<div class="symbol symbol-35px symbol-circle">
											<img alt="Pic" src="assets/media/avatars/300-9.jpg" />
										</div>
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">محمد رصایی</a>
											<div class="fw-semibold text-muted">f.mit@kpmg.com</div>
										</div>
									</div>
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">مهمان</option>
											<option value="2">مدیر</option>
											<option value="3" selected="selected">متفرقه </option>
										</select>
									</div>
								</div>
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<div class="d-flex align-items-center">
										<div class="symbol symbol-35px symbol-circle">
											<span class="symbol-label bg-light-danger text-danger fw-semibold">O</span>
										</div>
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">امید وحیدی</a>
											<div class="fw-semibold text-muted">olivia@corpmail.com</div>
										</div>
									</div>
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">مهمان</option>
											<option value="2" selected="selected">مدیر</option>
											<option value="3">متفرقه</option>
										</select>
									</div>
								</div>
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<div class="d-flex align-items-center">
										<div class="symbol symbol-35px symbol-circle">
											<span class="symbol-label bg-light-primary text-primary fw-semibold">N</span>
										</div>
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">محسن برومند</a>
											<div class="fw-semibold text-muted">owen.neil@gmail.com</div>
										</div>
									</div>
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1" selected="selected">مهمان</option>
											<option value="2">مدیر</option>
											<option value="3">متفرقه</option>
										</select>
									</div>
								</div>
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<div class="d-flex align-items-center">
										<div class="symbol symbol-35px symbol-circle">
											<img alt="Pic" src="assets/media/avatars/300-23.jpg" />
										</div>
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">علی کاربر</a>
											<div class="fw-semibold text-muted">dam@consilting.com</div>
										</div>
									</div>
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">مهمان</option>
											<option value="2">مدیر</option>
											<option value="3" selected="selected">متفرقه </option>
										</select>
									</div>
								</div>
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<div class="d-flex align-items-center">
										<div class="symbol symbol-35px symbol-circle">
											<span class="symbol-label bg-light-danger text-danger fw-semibold">E</span>
										</div>
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">الهام بارانی</a>
											<div class="fw-semibold text-muted">emma@intenso.com</div>
										</div>
									</div>
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">مهمان</option>
											<option value="2" selected="selected">مدیر</option>
											<option value="3">متفرقه</option>
										</select>
									</div>
								</div>
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<div class="d-flex align-items-center">
										<div class="symbol symbol-35px symbol-circle">
											<img alt="Pic" src="assets/media/avatars/300-12.jpg" />
										</div>
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">آنا کوهی</a>
											<div class="fw-semibold text-muted">ana.cf@limtel.com</div>
										</div>
									</div>
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1" selected="selected">مهمان</option>
											<option value="2">مدیر</option>
											<option value="3">متفرقه</option>
										</select>
									</div>
								</div>
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<div class="d-flex align-items-center">
										<div class="symbol symbol-35px symbol-circle">
											<span class="symbol-label bg-light-info text-info fw-semibold">A</span>
										</div>
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">رابرت دو</a>
											<div class="fw-semibold text-muted">robert@benko.com</div>
										</div>
									</div>
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">مهمان</option>
											<option value="2">مدیر</option>
											<option value="3" selected="selected">متفرقه </option>
										</select>
									</div>
								</div>
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<div class="d-flex align-items-center">
										<div class="symbol symbol-35px symbol-circle">
											<img alt="Pic" src="assets/media/avatars/300-13.jpg" />
										</div>
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">جواد مولای</a>
											<div class="fw-semibold text-muted">miller@mapple.com</div>
										</div>
									</div>
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">مهمان</option>
											<option value="2">مدیر</option>
											<option value="3" selected="selected">متفرقه </option>
										</select>
									</div>
								</div>
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<div class="d-flex align-items-center">
										<div class="symbol symbol-35px symbol-circle">
											<span class="symbol-label bg-light-success text-success fw-semibold">L</span>
										</div>
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">لقمان کامرانی</a>
											<div class="fw-semibold text-muted">lucy.m@fentech.com</div>
										</div>
									</div>
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">مهمان</option>
											<option value="2" selected="selected">مدیر</option>
											<option value="3">متفرقه</option>
										</select>
									</div>
								</div>
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<div class="d-flex align-items-center">
										<div class="symbol symbol-35px symbol-circle">
											<img alt="Pic" src="assets/media/avatars/300-21.jpg" />
										</div>
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">احسان ورزقانی</a>
											<div class="fw-semibold text-muted">ethan@loop.com.au</div>
										</div>
									</div>
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1" selected="selected">مهمان</option>
											<option value="2">مدیر</option>
											<option value="3">متفرقه</option>
										</select>
									</div>
								</div>
								<div class="d-flex flex-stack py-4">
									<div class="d-flex align-items-center">
										<div class="symbol symbol-35px symbol-circle">
											<span class="symbol-label bg-light-danger text-danger fw-semibold">E</span>
										</div>
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">الهام بارانی</a>
											<div class="fw-semibold text-muted">emma@intenso.com</div>
										</div>
									</div>
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">مهمان</option>
											<option value="2">مدیر</option>
											<option value="3" selected="selected">متفرقه </option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="d-flex flex-stack">
							<div class="me-5 fw-semibold">
								<label class="fs-6">افزودن کاربران</label>
								<div class="fs-7 text-muted">اگر به اطلاعات بیشتری نیاز دارید ، لطفا برنامه ریزی بودجه را بررسی کنید</div>
							</div>
							<label class="form-check form-switch form-check-custom form-check-solid">
								<input class="form-check-input" type="checkbox" value="1" checked="checked" />
								<span class="form-check-label fw-semibold text-muted">همه بدهکار هستیم</span>
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="{{asset('vendor/dashboard/metronic/metronic-23/js/plugins.bundle.js')}}"></script>
		<script src="{{asset('vendor/dashboard/metronic/metronic-23/js/scripts.bundle.js')}}"></script>
	</body>
</html>