<!--begin::User-->
<div class="d-flex align-items-center me-n3 ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
											<!--begin::Menu wrapper-->
											<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
												<img class="h-25px w-25px rounded" src="/image/{{ Auth::user()->image }}" alt="" />
												
											</div>
											<!--begin::Menu-->
											@guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Giriş') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Kayıt Ol') }}</a></li>
                        @else
											<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
												<!--begin::Menu item-->
												<div class="menu-item px-3">
													<div class="menu-content d-flex align-items-center px-3">
														<!--begin::Avatar-->
														<div class="symbol symbol-50px me-5">
															<img alt="Logo" src="{{ asset('theme/assets/media/avatars/150-25.jpg') }}" />
														</div>
														
														<!--end::Avatar-->
														<!--begin::Username-->
														<div class="d-flex flex-column">
															<div class="fw-bolder d-flex align-items-center fs-5"> {{ Auth::user()->name }}
															<span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span></div>
															<a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
														</div>
														<!--end::Username-->
													</div>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu separator-->
												<div class="separator my-2"></div>
												<!--end::Menu separator-->
												<!--begin::Menu item-->
												<!-- <div class="menu-item px-5">
													<a href="account/overview.html" class="menu-link px-5">My Profile</a>
												</div> -->
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<!-- <div class="menu-item px-5">
													<a href="pages/projects/list.html" class="menu-link px-5">
														<span class="menu-text">My Projects</span>
														<span class="menu-badge">
															<span class="badge badge-light-danger badge-circle fw-bolder fs-7">3</span>
														</span>
													</a>
												</div> -->
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start" data-kt-menu-flip="bottom">
													<!-- <a href="#" class="menu-link px-5">
														<span class="menu-title">My Subscription</span>
														<span class="menu-arrow"></span>
													</a> -->
													<!--begin::Menu sub-->
													<div class="menu-sub menu-sub-dropdown w-175px py-4">
														<!--begin::Menu item-->
														<!-- <div class="menu-item px-3">
															<a href="account/referrals.html" class="menu-link px-5">Referrals</a>
														</div> -->
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<!-- <div class="menu-item px-3">
															<a href="account/billing.html" class="menu-link px-5">Billing</a>
														</div> -->
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<!-- <div class="menu-item px-3">
															<a href="account/statements.html" class="menu-link px-5">Payments</a>
														</div> -->
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<!-- <div class="menu-item px-3">
															<a href="account/statements.html" class="menu-link d-flex flex-stack px-5">Statements
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="View your statements"></i></a>
														</div> -->
														<!--end::Menu item-->
														<!--begin::Menu separator-->
														<div class="separator my-2"></div>
														<!--end::Menu separator-->
														<!--begin::Menu item-->
														<!-- <div class="menu-item px-3">
															<div class="menu-content px-3">
																<label class="form-check form-switch form-check-custom form-check-solid">
																	<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
																	<span class="form-check-label text-muted fs-7">Notifications</span>
																</label>
															</div>
														</div> -->
														<!--end::Menu item-->
													</div>
													<!--end::Menu sub-->
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<!-- <div class="menu-item px-5">
													<a href="account/statements.html" class="menu-link px-5">My Statements</a>
												</div> -->
												<!--end::Menu item-->
												<!--begin::Menu separator-->
												<div class="separator my-2"></div>
												<!--end::Menu separator-->
												<!--begin::Menu item-->
												<div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start" data-kt-menu-flip="bottom">
													<!-- <a href="#" class="menu-link px-5">
														<span class="menu-title position-relative">Language
														<span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
														<img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('theme/assets/media/flags/united-states.svg') }}" alt="metronic" /></span></span>
													</a> -->
													<!--begin::Menu sub-->
													<div class="menu-sub menu-sub-dropdown w-175px py-4">
														<!--begin::Menu item-->
														<!-- <div class="menu-item px-3">
															<a href="account/settings.html" class="menu-link d-flex px-5 active">
															<span class="symbol symbol-20px me-4">
																<img class="rounded-1" src="{{ asset('theme/assets/media/flags/united-states.svg') }}" alt="metronic" />
															</span>English</a>
														</div> -->
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<!-- <div class="menu-item px-3">
															<a href="account/settings.html" class="menu-link d-flex px-5">
															<span class="symbol symbol-20px me-4">
																<img class="rounded-1" src="{{ asset('theme/assets/media/flags/spain.svg') }}" alt="metronic" />
															</span>Spanish</a>
														</div> -->
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<!-- <div class="menu-item px-3">
															<a href="account/settings.html" class="menu-link d-flex px-5">
															<span class="symbol symbol-20px me-4">
																<img class="rounded-1" src="{{ asset('theme/assets/media/flags/germany.svg') }}" alt="metronic" />
															</span>German</a>
														</div> -->
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<!-- <div class="menu-item px-3">
															<a href="account/settings.html" class="menu-link d-flex px-5">
															<span class="symbol symbol-20px me-4">
																<img class="rounded-1" src="{{ asset('theme/assets/media/flags/japan.svg') }}" alt="metronic" />
															</span>Japanese</a>
														</div> -->
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<!-- <div class="menu-item px-3">
															<a href="account/settings.html" class="menu-link d-flex px-5">
															<span class="symbol symbol-20px me-4">
																<img class="rounded-1" src="{{ asset('theme/assets/media/flags/france.svg') }}" alt="metronic" />
															</span>French</a>
														</div> -->
														<!--end::Menu item-->
													</div>
													<!--end::Menu sub-->
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<!-- <div class="menu-item px-5 my-1">
													<a href="account/settings.html" class="menu-link px-5">Account Settings</a>
												</div> -->
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-5">
												<a class="menu-link px-5" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Çıkış') }}
                                    </a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
												</div>
												


                                    
                                </div>
												<!--end::Menu item-->
											</div>
											<!--end::Menu-->
											@endguest
											<!--end::Menu wrapper-->
										</div>
										<!--end::User -->