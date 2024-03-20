@extends('backoffice.layouts.index')

@section('content')

<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel-content">
					<h4 class="main-title">Users Management</h4>
					<div class="row merged20 mb-4">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<div class="d-widget soft-red">
								<div class="d-widget-title">
									<h5>Realtime Users</h5>
								</div>
								<div class="d-widget-content">
									<span class="realtime-ico pulse"></span>
									<h6>Updating live</h6>
									<h5>223</h5>
									<i class="icofont-users-alt-3"></i>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<div class="d-widget soft-blue">
								<div class="d-widget-title">
									<h5>Realtime Watch</h5>
								</div>
								<div class="d-widget-content">
									<span class="realtime-ico pulse"></span>
									<h6>Updating live</h6>
									<h5>5016</h5>
									<i class="icofont-optic"></i>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<div class="d-widget soft-green">
								<div class="d-widget-title">
									<h5>Realtime Posts</h5>
								</div>
								<div class="d-widget-content">
									<span class="realtime-ico pulse"></span>
									<h6>Updating live</h6>
									<h5>5.3K</h5>
									<i class="icofont-computer"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="row merged20 mb-4">
						<div class="col-lg-8">
							<div class="d-widget">
								<div class="d-widget-title">
									<h5>Top Users</h5>
								</div>
								<table class="table-default table table-striped table-responsive-md">
								<thead>
								  <tr>
									<th class="wd-35p">Name</th>
									<th class="wd-15p">Sales</th>
									<th class="wd-25p">Ratings</th>
									<th class="wd-25p">Earnings ($)</th>
								  </tr>
								</thead>
								<tbody>
									<tr>
									<td>
									  <div class="d-flex align-items-center">
										<div class="avatar avatar-xs"><span class="avatar-initial rounded-circle bg-secondary">s</span></div>
										<span class="tx-medium mg-l-10">Socrates Itumay</span>
									  </div>
									</td>
									<td>58</td>
									<td>
									  <div class="rating-stars">
										<span>96%</span>
										<ul>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
										  </ul>
									  </div>
									</td>
									<td>302, 422.50</td>
								  </tr>
								  	<tr>
									<td>
									  <div class="d-flex align-items-center">
										<div class="avatar avatar-xs"><img src="/backoffice/images/resources/user2.jpg" class="rounded-circle" alt=""></div>
										<span class="tx-medium mg-l-10">Dianne Aceron</span>
									  </div>
									</td>
									<td>49</td>
									<td>
									  <div class="rating-stars">
										<span>85%</span>
										<ul>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
										  </ul>
									  </div><!-- rating-stars -->
									</td>
									<td>264, 090.00</td>
								  </tr>
								  	<tr>
									<td>
									  <div class="d-flex align-items-center">
										<div class="avatar avatar-xs"><img src="/backoffice/images/resources/user6.jpg" class="rounded-circle" alt=""></div>
										<span class="tx-medium mg-l-10">Katherine Movera</span>
									  </div>
									</td>
									<td>40</td>
									<td>
									  <div class="rating-stars">
										<span>79%</span>
										<ul>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
										  </ul>
									  </div><!-- rating-stars -->
									</td>
									<td>238, 720.80</td>
								  </tr>
								  	<tr>
									<td>
									  <div class="d-flex align-items-center">
										<div class="avatar avatar-xs"><span class="avatar-initial rounded-circle bg-primary">r</span></div>
										<span class="tx-medium mg-l-10">Reynante Labares</span>
									  </div>
									</td>
									<td>38</td>
									<td>
									  <div class="rating-stars">
										<span>45%</span>
										<ul>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
										  </ul>
									  </div>
									</td>
									<td>227, 063.20</td>
								  </tr>
								  	<tr>
									<td>
									  <div class="d-flex align-items-center">
										<div class="avatar avatar-xs"><span class="avatar-initial rounded-circle bg-dark">d</span></div>
										<span class="tx-medium mg-l-10">Dexter Dela Cruz</span>
									  </div>
									</td>
									<td>26</td>
									<td>
									  <div class="rating-stars">
										<span>76%</span>
										<ul>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
										  </ul>
									  </div>
									</td>
									<td>202, 918.00</td>
								  </tr>
								  	<tr>
									<td>
									  <div class="d-flex align-items-center">
										<div class="avatar avatar-xs"><span class="avatar-initial rounded-circle bg-purple">j</span></div>
										<span class="tx-medium mg-l-10">Johnwyne Mendez</span>
									  </div>
									</td>
									<td>26</td>
									<td>
									  <div class="rating-stars">
										<span>88%</span>
										<ul>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
										  </ul>
									  </div>
									</td>
									<td>202, 918.00</td>
								  </tr>
									<tr>
									<td>
									  <div class="d-flex align-items-center">
										<div class="avatar avatar-xs"><img src="/backoffice/images/resources/user8.jpg" class="rounded-circle" alt=""></div>
										<span class="tx-medium mg-l-10">Evelyn Movera</span>
									  </div>
									</td>
									<td>40</td>
									<td>
									  <div class="rating-stars">
										<span>79%</span>
										<ul>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
										  </ul>
									  </div><!-- rating-stars -->
									</td>
									<td>238, 720.80</td>
								  </tr>
									<tr>
									<td>
									  <div class="d-flex align-items-center">
										<div class="avatar avatar-xs"><img src="/backoffice/images/resources/user7.jpg" class="rounded-circle" alt=""></div>
										<span class="tx-medium mg-l-10">Jackson will</span>
									  </div>
									</td>
									<td>40</td>
									<td>
									  <div class="rating-stars">
										<span>79%</span>
										<ul>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
										  </ul>
									  </div><!-- rating-stars -->
									</td>
									<td>238, 720.80</td>
								  </tr>
									<tr>
									<td>
									  <div class="d-flex align-items-center">
										<div class="avatar avatar-xs"><img src="/backoffice/images/resources/user2.jpg" class="rounded-circle" alt=""></div>
										<span class="tx-medium mg-l-10">Katherine Sima</span>
									  </div>
									</td>
									<td>40</td>
									<td>
									  <div class="rating-stars">
										<span>79%</span>
										<ul>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
											<li><i class="icofont-star"></i></li>
										  </ul>
									  </div><!-- rating-stars -->
									</td>
									<td>238, 720.80</td>
								  </tr>
								</tbody>
							  </table>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="d-widget mb-4">
								<div class="d-widget-title">
									<h5>Todsy's Earnings</h5>
								</div>
								<div class="d-widget-content">
									<ul class="earningz">
										<li><span>Books: </span> 55 sales <em>$200</em></li>
										<li><span>Courses: </span> 20 sales <em>$500</em></li>
										<li><span>Other: </span> 2 sales <em>$100</em></li>
									</ul>
									<div class="totl-blnce">
										<span>Balance: <i>$205.03</i></span>
									</div>
									
<svg id="dolor-sign" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign earning"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="d-widget">
										<div class="d-widget-title">
											<h5>Top Five active</h5>
										</div>
										<ul class="top-5">
											<li>
												<figure><img src="/backoffice/images/resources/user1.jpg" alt=""><span class="status online"></span></figure>
												<a href="#" title="">Big Boss</a>
												<span class="user-active-time">23hrs/day</span>
											</li>
											<li>
												<figure><img src="/backoffice/images/resources/user2.jpg" alt=""><span class="status online"></span></figure>
												<a href="#" title="">Sarah Jane</a>
												<span class="user-active-time">22hrs/day</span>
											</li>
											<li>
												<figure><img src="/backoffice/images/resources/user3.jpg" alt=""><span class="status online"></span></figure>
												<a href="#" title="">Andrew</a>
												<span class="user-active-time">20hrs/day</span>
											</li>
											<li>
												<figure><img src="/backoffice/images/resources/user4.jpg" alt=""><span class="status online"></span></figure>
												<a href="#" title="">Frank</a>
												<span class="user-active-time">19hrs/day</span>
											</li>
											<li>
												<figure><img src="/backoffice/images/resources/user5.jpg" alt=""><span class="status online"></span></figure>
												<a href="#" title="">Bob Emily</a>
												<span class="user-active-time">18hrs/day</span>
											</li>
										</ul>
									</div>
								</div>
							</div>	
						</div>
					</div>
					<div class="row merged20 mb-4">
						<div class="col-lg-6">
							<div class="d-widget pd-0 soft-red mb-4">
								<div class="d-widget-meta">
									<div class="w-icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
									</div>
									<h5 class="">Referral</h5>
									<p class="w-value">1,900</p>
								</div>
								<div class="d-widget-content">    
									<div class="w-chart">
										<div id="hybrid_followers1"></div>
									</div>
								</div>
							</div>
							<div class="d-widget bg-danger uk-light">
								<div class="d-widget-title">
									<h5>Violation Reports</h5>
								</div>
								<div class="d-widget-content">
									<div class="violetion-message">
										<p>
											<i class="icofont-info-circle"></i>
											Report about the sex content violation of socimo
											<a class="button soft-danger circle" href="#" title="">Take Action</a>
										</p>
										<p>
											<i class="icofont-info-circle"></i>
											Report about abuse violation of socimo
											<a class="button soft-danger circle" href="#" title="">Take Action</a>
										</p>
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="d-widget">
								<div class="d-widget-title"><h5>Daily Active Users</h5></div>
								<div id="uniqueVisits"></div>
							</div>
						</div>
					</div>
					<div class="row merged20 mb-4">
						<div class="col-lg-12">
							<div class="d-widget">
								<div class="d-widget-title">
									<h5>Manage Users</h5>
								</div>
								<div class="d-widget-content">
									<table class="table manage-user table-default table-responsive-md">
										<thead>
											<tr>
												<th>User Name</th>
												<th>View profile</th>
												<th>Chat History</th>
												<th>Blocked</th>
												<th>Hide</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<figure><img src="/backoffice/images/resources/user.png" alt=""></figure>
													<h5>Maria K.</h5>
												</td>
												<td><a class="mini-btn" href="#" title="">view</a></td>
												<td><a class="mini-btn" href="#" title="">view</a></td>
												<td>
													<div class="switch-btn">
														<input type="checkbox" hidden="hidden" id="switch1">
														<label class="switch" for="switch1"></label>
													</div>
												</td>
												<td>
													<div class="switch-btn">
														<input type="checkbox" hidden="hidden" id="switch2">
														<label class="switch" for="switch2"></label>
													</div>
												</td>
												<td>
													<div class="actions-btn">
														<span class="iconbox button soft-primary"><i class="icofont-pen-alt-1"></i></span>
														<span class="iconbox button soft-danger"><i class="icofont-trash"></i></span>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<figure><img src="/backoffice/images/resources/user2.jpg" alt=""></figure>
													<h5>Sarika sing.</h5>
												</td>
												<td><a class="mini-btn" href="#" title="">view</a></td>
												<td><a class="mini-btn" href="#" title="">view</a></td>
												<td>
													<div class="switch-btn">
														<input type="checkbox" hidden="hidden" id="switch3">
														<label class="switch" for="switch3"></label>
													</div>
												</td>
												<td>
													<div class="switch-btn">
														<input type="checkbox" hidden="hidden" id="switch4">
														<label class="switch" for="switch4"></label>
													</div>
												</td>
												<td>
													<div class="actions-btn">
														<span class="iconbox button soft-primary"><i class="icofont-pen-alt-1"></i></span>
														<span class="iconbox button soft-danger"><i class="icofont-trash"></i></span>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<figure><img src="/backoffice/images/resources/user3.jpg" alt=""></figure>
													<h5>King Khan</h5>
												</td>
												<td><a class="mini-btn" href="#" title="">view</a></td>
												<td><a class="mini-btn" href="#" title="">view</a></td>
												<td>
													<div class="switch-btn">
														<input type="checkbox" hidden="hidden" id="switch5">
														<label class="switch" for="switch5"></label>
													</div>
												</td>
												<td>
													<div class="switch-btn">
														<input type="checkbox" hidden="hidden" id="switch6">
														<label class="switch" for="switch6"></label>
													</div>
												</td>
												<td>
													<div class="actions-btn">
														<span class="iconbox button soft-primary"><i class="icofont-pen-alt-1"></i></span>
														<span class="iconbox button soft-danger"><i class="icofont-trash"></i></span>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<figure><img src="/backoffice/images/resources/user4.jpg" alt=""></figure>
													<h5>jacob</h5>
												</td>
												<td><a class="mini-btn" href="#" title="">view</a></td>
												<td><a class="mini-btn" href="#" title="">view</a></td>
												<td>
													<div class="switch-btn">
														<input type="checkbox" hidden="hidden" id="switch7">
														<label class="switch" for="switch7"></label>
													</div>
												</td>
												<td>
													<div class="switch-btn">
														<input type="checkbox" hidden="hidden" id="switch8">
														<label class="switch" for="switch8"></label>
													</div>
												</td>
												<td>
													<div class="actions-btn">
														<span class="iconbox button soft-primary"><i class="icofont-pen-alt-1"></i></span>
														<span class="iconbox button soft-danger"><i class="icofont-trash"></i></span>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<figure><img src="/backoffice/images/resources/user5.jpg" alt=""></figure>
													<h5>Andrew</h5>
												</td>
												<td><a class="mini-btn" href="#" title="">view</a></td>
												<td><a class="mini-btn" href="#" title="">view</a></td>
												<td>
													<div class="switch-btn">
														<input type="checkbox" hidden="hidden" id="switch9">
														<label class="switch" for="switch9"></label>
													</div>
												</td>
												<td>
													<div class="switch-btn">
														<input type="checkbox" hidden="hidden" id="switch10">
														<label class="switch" for="switch10"></label>
													</div>
												</td>
												<td>
													<div class="actions-btn">
														<span class="iconbox button soft-primary"><i class="icofont-pen-alt-1"></i></span>
														<span class="iconbox button soft-danger"><i class="icofont-trash"></i></span>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="row merged20 mb-4">
						<div class="col-lg-12">
							<div class="d-widget">
								<div class="d-widget-title">
									<h5>Latest Transcations</h5>
								</div>
								<table class="table-default table table-striped table-responsive-md">
									<thead>
										<tr>
											<th>Order#</th>
											<th>Product Name</th>
											<th>Date</th>
											<th>Total</th>
											<th>Status</th>
											<th>Pay Method</th>
											<th>Invoice</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>001</td>
											<td class="productss"><a href="#" title=""><img src="/backoffice/images/resources/course-1.jpg" alt=""> Html Basics Book</a></td>
											<td>17-Oct-20</td>
											<td>$50</td>
											<td>Delivered</td>
											<td>Paypal</td>
											<td><a href="#" title="">view invoice</a></td>
										</tr>
										<tr>
											<td>002</td>
											<td class="productss"><a href="#" title=""><img src="/backoffice/images/resources/course-2.jpg" alt=""> VU.Js script Book</a></td>
											<td>15-Oct-20</td>
											<td>$30</td>
											<td>On Way</td>
											<td>Payoneer</td>
											<td><a href="#" title="">view inoice</a></td>
										</tr>
										<tr>
											<td>003</td>
											<td class="productss"><a href="#" title=""><img src="/backoffice/images/resources/course-3.jpg" alt=""> Online Css3 Course</a></td>
											<td>07-Oct-20</td>
											<td>$20</td>
											<td>Pending</td>
											<td>Visa</td>
											<td><a href="#" title="">view invoice</a></td>
										</tr>
										<tr>
											<td>004</td>
											<td class="productss"><a href="#" title=""><img src="/backoffice/images/resources/course-4.jpg" alt=""> Online Course Basic HTML</a></td>
											<td>02-Oct-20</td>
											<td>$10</td>
											<td>Delivered</td>
											<td>Paypal</td>
											<td><a href="#" title="">view invoice</a></td>
										</tr>
										<tr>
											<td>005</td>
											<td class="productss"><a href="#" title=""><img src="/backoffice/images/resources/course-5.jpg" alt=""> PHP Advance Course</a></td>
											<td>27-Sep-20</td>
											<td>$30</td>
											<td>Delivered</td>
											<td>COD</td>
											<td><a href="#" title="">view invoice</a></td>
										</tr>
										<tr>
											<td>006</td>
											<td class="productss"><a href="#" title=""><img src="/backoffice/images/resources/course-6.jpg" alt=""> Advance Wp Book</a></td>
											<td>25-Sep-20</td>
											<td>$25</td>
											<td>Return</td>
											<td>Bitcoin</td>
											<td><a href="#" title="">view invoice</a></td>
										</tr>
										<tr>
											<td>007</td>
											<td class="productss"><a href="#" title=""><img src="/backoffice/images/resources/course-2.png" alt=""> Online Marketing</a></td>
											<td>24-Sep-20</td>
											<td>$22</td>
											<td>Delivered</td>
											<td>Master Card</td>
											<td><a href="#" title="">view invoice</a></td>
										</tr>
										<tr>
											<td>008</td>
											<td class="productss"><a href="#" title=""><img src="/backoffice/images/resources/course-1.jpg" alt=""> Advance PHP Book</a></td>
											<td>20-Sep-20</td>
											<td>$29</td>
											<td>Pending</td>
											<td>Visa</td>
											<td><a href="#" title="">view invoice</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- main content -->
	

@endsection