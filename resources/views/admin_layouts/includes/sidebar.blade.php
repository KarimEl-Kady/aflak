<!--begin::Page-->
<div class="d-flex flex-row flex-column-fluid page">
    <!--begin::Aside-->
    <!--begin::Aside-->
    <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
        <!--begin::Brand-->
        <div class="brand flex-column-auto" id="kt_brand">
            <!--begin::Logo-->
            <a href="" class="brand-logo">
                <img alt="Logo" src="{{ $setting->logo_link ? $setting->logo_link : asset('website/img/title.png') }}" style="width: 110px;
    height: 74px;" />
            </a>
            <!--end::Logo-->
            <!--begin::Toggle-->
            <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                <span class="svg-icon svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path
                                d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                fill="#000000" fill-rule="nonzero"
                                transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                            <path
                                d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3"
                                transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </button>
            <!--end::Toolbar-->
        </div>
        <!--end::Brand-->
        <!--begin::Aside Menu-->
        <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
            <!--begin::Menu Container-->
            <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
                data-menu-dropdown-timeout="500">
                <!--begin::Menu Nav-->
                <ul class="menu-nav">

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.admins') }}</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">{{ __('messages.admins') }}</span>
                                    </span>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="{{ route('admins.index') }}" class="menu-link">
                                        <span class="menu-text">{{ __('messages.all') }}</span>
                                    </a>
                                </li>

                            </ul>



                        </div>
                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.home_slider_images') }}</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">{{ __('messages.Home') }}</span>
                                    </span>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="{{route('home_sliders.index')  }}" class="menu-link">
                                        <span class="menu-text">{{ __('messages.home_slider') }}</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="{{route('home_slider_images.index')  }}" class="menu-link">
                                        <span class="menu-text">{{ __('messages.home_slider_image') }}</span>
                                    </a>
                                </li>

                            </ul>

                        </div>
                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.blogs') }}</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">{{ __('messages.blogs') }}</span>
                                    </span>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="{{ route('blogs.index') }}" class="menu-link">
                                        <span class="menu-text">{{ __('messages.blogs') }}</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="{{ route('sections.index') }}" class="menu-link">
                                        <span class="menu-text">{{ __('messages.sections') }}</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="{{ route('hashtags.index') }}" class="menu-link">
                                        <span class="menu-text">{{ __('messages.hashtags') }}</span>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </li>


                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.advantages') }}</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">{{ __('messages.advantage') }}</span>
                                    </span>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                    data-menu-toggle="hover">
                                    <a href="{{ route('advantages.index')  }}" class="menu-link">
                                        <span class="menu-text">{{ __('messages.advantages') }}</span>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.services') }}</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">{{ __('messages.about_us') }}</span>
                                    </span>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                    data-menu-toggle="hover">
                                    <a href="{{ route('services.index')  }}" class="menu-link">
                                        <span class="menu-text">{{ __('messages.services') }}</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                    data-menu-toggle="hover">
                                    <a href="{{ route('service_features.index')  }}" class="menu-link">
                                        <span class="menu-text">{{ __('messages.service_features') }}</span>
                                    </a>
                                </li>
                            </ul>


                        </div>
                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.about_us') }}</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">{{ __('messages.about_us') }}</span>
                                    </span>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                    data-menu-toggle="hover">
                                    <a href="{{ route('about_us.index')  }}" class="menu-link">
                                        <span class="menu-text">{{ __('messages.about_us') }}</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                    data-menu-toggle="hover">
                                    <a href="{{ route('about_us_features.index')  }}" class="menu-link">
                                        <span class="menu-text">{{ __('messages.about_us_features') }}</span>
                                    </a>
                                </li>
                            </ul>


                        </div>
                    </li>

                    {{-- posts link Start --}}
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('steps.index')}}" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.steps') }}</span>
                            {{-- <i class="menu-arrow"></i> --}}
                        </a>

                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('clients.index')}}" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.clients') }}</span>
                            {{-- <i class="menu-arrow"></i> --}}
                        </a>

                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.email_news') }}</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">{{ __('messages.email_news') }}</span>
                                    </span>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                    data-menu-toggle="hover">
                                    <a href="{{ route('email_news.index')  }}" class="menu-link">
                                        <span class="menu-text">{{ __('messages.email_news') }}</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                    data-menu-toggle="hover">
                                    <a href="{{ route('news_email_settings.index')  }}" class="menu-link">
                                        <span class="menu-text">{{ __('messages.news_email_settings') }}</span>
                                    </a>
                                </li>
                            </ul>


                        </div>
                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('join_sections.index')}}" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.join_sections') }}</span>
                            {{-- <i class="menu-arrow"></i> --}}
                        </a>

                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('our_stories.index')}}" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.our_stories') }}</span>
                            {{-- <i class="menu-arrow"></i> --}}
                        </a>

                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('logisitic_setcions.index')}}" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.logisitic_setcions') }}</span>
                            {{-- <i class="menu-arrow"></i> --}}
                        </a>

                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('request_sections.index')}}" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.request_sections') }}</span>
                            {{-- <i class="menu-arrow"></i> --}}
                        </a>

                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('request_section_settings.index')}}" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.request_section_settings') }}</span>
                            {{-- <i class="menu-arrow"></i> --}}
                        </a>

                    </li>



                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('our_goals.index')}}" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.our_goal') }}</span>
                            {{-- <i class="menu-arrow"></i> --}}
                        </a>

                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('common_questions.index')}}" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.common_questions') }}</span>
                            {{-- <i class="menu-arrow"></i> --}}
                        </a>

                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('privacies.index')}}" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.privacies') }}</span>
                            {{-- <i class="menu-arrow"></i> --}}
                        </a>

                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('requests.index')}}" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.requests') }}</span>
                            {{-- <i class="menu-arrow"></i> --}}
                        </a>

                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('messages.index')}}" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.messages') }}</span>
                            {{-- <i class="menu-arrow"></i> --}}
                        </a>

                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('settings.index')}}" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span class="menu-text">{{ __('messages.settings') }}</span>
                            {{-- <i class="menu-arrow"></i> --}}
                        </a>

                    </li>

                </ul>
                <!--end::Menu Nav-->
            </div>
            <!--end::Menu Container-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside-->
    <!--begin::Wrapper-->
    <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

        <!--begin::Header-->
        <div id="kt_header" class="header header-fixed">
            <!--begin::Container-->
            <div class="container-fluid d-flex align-items-stretch justify-content-between">
                <!--begin::Header Menu Wrapper-->
                <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                    <!--begin::Header Menu-->
                    <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                        <!--begin::Header Nav-->
                        <?php
                        $other_locale = LaravelLocalization::getCurrentLocale() == 'en' ? 'Ar' : 'En';
                        $flag = LaravelLocalization::getCurrentLocale() == 'ar' ? asset('assets/media/svg/flags/226-united-states.svg') : asset('assets/media/svg/flags/133-saudi-arabia.svg');
                        ?>
                        <ul class="menu-nav">

                        </ul>
                        <!--end::Header Nav-->
                    </div>
                    <!--end::Header Menu-->
                </div>
                <!--end::Header Menu Wrapper-->
                <!--begin::Topbar-->
                <div class="topbar">

                    <!--begin::Languages-->
                    <div class="dropdown">
                        <!--begin::Toggle-->
                        <!-- <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px"> -->
                        <a class="nav-link mt-4"
                            href="{{ LaravelLocalization::getLocalizedURL(strtolower($other_locale), null, [], true) }}">

                            <img class="h-20px w-20px rounded-sm" src="{{ $flag }}" alt="" />
                            <!-- {{ $other_locale }} -->
                        </a>
                        <!-- <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">




       </div> -->
                        <!-- </div> -->
                        <!--end::Toggle-->
                        <!--begin::Dropdown-->
                        <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                            <!--begin::Nav-->

                            <!-- <ul class="navi navi-hover py-4">
       @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
<li>
  <li class="navi-item">
  <a rel="alternate" hreflang="{{ $localeCode }}"
  href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
  class="navi-link">
          <span class="symbol symbol-20 mr-3">
          </span>
          <span class="navi-text">   {{ $properties['native'] }}</span>
         </a>
        </li>

        </li>
@endforeach

       </ul> -->
                            <!--end::Nav-->
                        </div>
                        <!--end::Dropdown-->
                    </div>
                    <!--end::Languages-->
                    <!--begin::User-->
                    <div class="dropdown">
                        <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                            <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                                id="kt_quick_user_toggle">
                                <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">
                                    {{ __('messages.hi') }}</span>
                                <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">
                                </span>
                                <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                    <img alt="Logo" src="{{ asset('assets/media/logo.png') }}" /></span>

                            </div>
                        </div>
                        <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                            <ul class="navi navi-hover py-4">
                                <!--begin::Item-->
                                <li class="navi-item">
                                    <a href="{{ route('logout') }}" class="navi-link">
                                        <span class="navi-text">{{ __('messages.logout') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Topbar-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Header-->

        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            @yield('content')
        </div>
        <!--end::Content-->

        <script>
            var url = window.location;
            // for treeview
            $('ul.menu-subnav .menu-item a').filter(function() {
                return this.href == url;
            }).parentsUntil(".menu-parent-menu > .menu-item a").addClass('active menu-item-open');
        </script>
