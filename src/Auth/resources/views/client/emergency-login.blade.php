<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl">
<!--begin::Head-->

<head>
	<title>ورود | {{env('APP_NAME')}}</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
	<!--begin::Fonts(mوatory for all pages)-->
	<link href="{{asset('vendor/auth/css/fonts.css')}}" rel="stylesheet" type="text/css" />
	<!--end::Fonts-->
	<!--begin::Global Stylesheets Bundle(mوatory for all pages)-->
	<link href="{{asset('vendor/auth/metronic/metronic-8/css/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('vendor/auth/metronic/metronic-8/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('vendor/auth/fontawesome/css/solid.min.css')}}" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
	<!--begin::Theme mode setup on page load-->
	<script>
	themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
		
	document.documentElement.setAttribute("data-theme", themeMode);
	</script>
	<!--end::Theme mode setup on page load-->
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page bg image-->
		<style>
			body {
				background: url("{{asset('vendor/auth/metronic/metronic-8/images/bg10.jpeg')}}") 100% 100% fixed;
			}

			[data-theme="dark"] body {
				background: url("{{asset('vendor/auth/metronic/metronic-8/images/bg10-dark.jpeg')}}") 100% 100% fixed;
			}
		</style>
		<!--end::Page bg image-->
		<!--begin::احراز هویت - ورود -->
		<div class="d-flex flex-column flex-lg-row flex-column-fluid">
			<!--begin::کناری-->
			<div class="d-flex flex-lg-row-fluid">
				<!--begin::Content-->
				<div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
					<!--begin::Image-->
					<img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{asset('vendor/auth/metronic/metronic-8/images/agency.png')}}" alt="" />
					<img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{asset('vendor/auth/metronic/metronic-8/images/agency-dark.png')}}" alt="" />
					<!--end::Image-->
					<!--begin::Title-->
					<h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">{{env('APP_NAME')}}</h1>
					<!--end::Title-->
					<!--begin::Text-->
					<div class="text-gray-600 fs-base text-center fw-semibold">{{get_option('emergency-login-description')}}</div>
					<!--end::Text-->
				</div>
				<!--end::Content-->
			</div>
			<!--begin::کناری-->
			<!--begin::Body-->
			<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
				<!--begin::Wrapper-->
				<div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10 shadow-sm">
					<!--begin::Content-->
					<div class="w-md-400px">
						<!--begin::Form-->
						<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="../../demo8/dist/index.html" action="#">
							<!--begin::Heading-->
							<div class="text-center mb-11">
								<!--begin::Title-->
								<h1 class="text-dark fw-bolder mb-3">ورود</h1>
								<!--end::Title-->
								<!--begin::Subtitle-->
								<div class="text-gray-500 fw-semibold fs-6">حساب کاربری نهاد</div>
								<!--end::Subtitle=-->
							</div>
							<!--begin::Heading-->
							<!--begin::Login options-->
							<div class="row g-3 mb-9">
								<!--begin::Col-->
								<div class="col-md-12">
									<!--begin::گوگل link=-->
									<a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
										<img alt="Logo" src="{{asset('vendor/auth/images/nahad-logo.png')}}" class="h-15px me-3" />
										ورود از طریق حساب کاربری نهاد همراه
									</a>
									<!--end::گوگل link=-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Login options-->
							<!--begin::Separator-->
							<div class="separator separator-content my-14">
								<span class="w-125px text-gray-500 fw-semibold fs-7">یا با رمز موقت</span>
							</div>
							<!--end::Separator-->
							<!--begin::Input group=-->
							<div class="fv-row mb-8">
								<!--begin::ایمیل-->
								<input type="text" placeholder="کدملی" name="username" autocomplete="off" class="form-control bg-transparent" />
								<!--end::ایمیل-->
							</div>
							<!--end::Input group=-->
							<div class="fv-row mb-8">
								<!--begin::password-->
								<input type="text" placeholder="موبایل" name="mobile" autocomplete="off" class="form-control bg-transparent" />
								<!--end::password-->
							</div>
							<!--end::Input group=-->
							<!--end::Input group=-->
							<div class="fv-row mb-3">
							<div class="input-group mb-3">
								<button type="button" class="btn btn-light" 
									id="refresh-captcha"
									onclick="document.getElementById('captcha').src = '{{captcha_src('math')}}?' + Math.random() ;">
									<i class="fas fa-refresh"></i>
								</button>
								<img src="{{captcha_src('math')}}" class="rounded-end" style="flex: 1;" id="captcha"/>
							</div>
								
								<!--begin::password-->
								<input type="text" placeholder="کد امنیتی" name="captcha" autocomplete="off" class="form-control bg-transparent" />
								<!--end::password-->
							</div>
							<!--end::Input group=-->
							<!--begin::Wrapper-->
							<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
								<div></div>
							</div>
							<!--end::Wrapper-->
							<!--begin::ثبت button-->
							<div class="d-grid mb-10">
								<button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
									<!--begin::Indicator label-->
									<span class="indicator-label">ورود</span>
									<!--end::Indicator label-->
									<!--begin::Indicator progress-->
									<span class="indicator-progress">لطفا صبر کنید...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
									</span>
									<!--end::Indicator progress-->
								</button>
							</div>
							<!--end::ثبت button-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Body-->
		</div>
		<!--end::احراز هویت - ورود-->
	</div>
	<!--end::Root-->
	<!--end::Main-->
	<script src="{{asset('vendor/auth/metronic/metronic-8/js/plugins.bundle.js')}}"></script>
	<script src="{{asset('vendor/auth/metronic/metronic-8/js/scripts.bundle.js')}}"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::سفارشی Javascript(used for this page only)-->
	<script src="{{asset('vendor/auth/metronic/metronic-8/js/general.js')}}"></script>
	<!--end::سفارشی Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>