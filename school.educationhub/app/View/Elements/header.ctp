<div id="header-wrapper">
        <header>
	    	<!-- main menu container starts here -->
                            <div class="menu-main-menu-container header1">
                    <div class="container" style="padding:0;">
                        <div id="logo">								
                        	<a href="" title="<?php echo $this->Html->url('/'); ?>">
									<?php echo $this->Html->image('logo.png',array('class'=>'normal_logo','alt'=>'Learning Management System WordPress Theme','title'=>'Learning Management System WordPress Theme','id'=>'site-logo')); ?>
									<?php echo $this->Html->image('logo@2x.png',array('class'=>'retina_logo','alt'=>'Learning Management System WordPress Theme','title'=>'Learning Management System WordPress Theme','style'=>'width:174px; height:94px;')); ?>
								</a>                        
                        </div>
						<div id="primary-menu">                        
                            <nav id="main-menu"><ul id="menu-main-menu" class="menu">
                            	<li id="menu-item-34" class="<?php echo $navLink['home']?> menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-8 current_page_item menu-item-depth-0 menu-item-simple-parent">
                            		<!--<a href="index.html"><span class='menu-icon fa fa-home'> </span>Home</a>-->
                            		<?php echo $this->Html->link(__("<span class='menu-icon fa fa-home'> </span>Home"),'/',array('escape'=>false)) ?>
                            	</li>

                    <li id="menu-item-4140" class="<?php echo $navLink['school']?> menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-0 menu-item-simple-parent ">
                    	<a href="#"><span class='menu-icon fa fa-book'> </span>School</a>
						<ul class="sub-menu">
							<li id="menu-item-4141" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-1">
								<!--<a href="lesson/index.html">Lessons</a>-->
								<?php echo $this->Html->link(__('My School'),array('controller'=>'schools','action'=>'index','admin'=>false)) ?>
							</li>
							<li id="menu-item-4139" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-1">
								<!--<a href="my-courses/index.html">My Courses</a>-->
								<?php echo $this->Html->link(__('My Account'),array('controller'=>'users','action'=>'profile','admin'=>false)) ?>
							</li>
						</ul>
					</li>

<li id="menu-item-66" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-0 menu-item-megamenu-parent  megamenu-3-columns-group"><a href="shop/index.html"><span class='menu-icon fa fa-shopping-cart'> </span>Shop</a>
<div class='megamenu-child-container'>

<ul class="sub-menu">
	<li id="menu-item-2409" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-1"><a href="shop/shop-four-column/index.html">IV Column</a>
	<ul class="sub-menu">
		<li id="menu-item-2418" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shop/shop-four-column/index.html">Without Sidebar</a></li>
		<li id="menu-item-2410" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shop/shop-four-column-with-left-sidebar/index.html">With Left Sidebar</a></li>
		<li id="menu-item-2411" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shop/shop-four-column-with-right-sidebar/index.html">With Right Sidebar</a></li>
	</ul>
</li>
	<li id="menu-item-2412" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-1"><a href="shop/shop-three-column/index.html">III Column</a>
	<ul class="sub-menu">
		<li id="menu-item-2419" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shop/shop-three-column/index.html">Without Sidebar</a></li>
		<li id="menu-item-2413" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shop/shop-three-column-with-left-sideber/index.html">With Left Sidebar</a></li>
		<li id="menu-item-2414" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shop/shop-three-column-with-right-sidebar/index.html">With Right Sidebar</a></li>
	</ul>
</li>
	<li id="menu-item-2415" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-1"><a href="shop/shop-two-column/index.html">II Column</a>
	<ul class="sub-menu">
		<li id="menu-item-2420" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shop/shop-two-column/index.html">Without Sidebar</a></li>
		<li id="menu-item-2416" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shop/shop-two-column-with-left-sidebar/index.html">With Left Sidebar</a></li>
		<li id="menu-item-2417" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shop/shop-two-column-with-right-sidebar/index.html">With Right Sidebar</a></li>
	</ul>
</li>
	<li id="menu-item-65" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-1"><a href="cart/index.html">Cart</a></li>
	<li id="menu-item-64" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-1"><a href="checkout/index.html">Checkout</a></li>
	<li id="menu-item-62" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-1"><a href="my-account/index.html">My Account</a></li>
	<li id="menu-item-3276" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-1 menu-item-fullwidth "><span class="nolink-menu"></span><div class='dt-megamenu-custom-content'><a href="http://themeforest.net/item/guru-learning-management-wordpress-theme/7807232?ref=designthemes" title="">
		<!--<img src="../../../wac.bee4.edgecastcdn.net/80BEE4/cdn-designthemes/themes/dt-guru/wp-content/uploads/2014/05/mega-menu.jpg" alt="mega-menu-img" title="Purchase Theme">-->
		<?php //echo $this->Html->image('mega-menu.jpg',array('class'=>'retina_logo','alt'=>'','title'=>'Purchase Theme')); ?>
	</a></div></li>
</ul>

</div>
</li>
<li id="menu-item-4081" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-0 menu-item-simple-parent "><a href="about/index.html"><span class='menu-icon fa fa-gift'> </span>Pages</a>


<ul class="sub-menu">
	<li id="menu-item-3186" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-depth-1"><a href="events/index.html">Events</a>
	<ul class="sub-menu">
		<li id="menu-item-3187" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-2"><a href="events/upcoming/index.html">Event Listing</a></li>
		<li id="menu-item-3188" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-2"><a href="events/week/2014-03-24/index.html">Events Week</a></li>
		<li id="menu-item-3189" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-2"><a href="events/2014-03-25/index.html">Events Day</a></li>
		<li id="menu-item-3190" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-2"><a href="events/map/indexc0b9.html?tribe-bar-date=2014-02-04">Events Map</a></li>
		<li id="menu-item-3191" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-2"><a href="events/photo/index.html">Events Photo</a></li>
	</ul>
</li>
	<li id="menu-item-31" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-1"><a href="about/index.html">About</a>
	<ul class="sub-menu">
		<li id="menu-item-3180" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-2"><a href="404.html">404 &#8211; Not Found</a></li>
	</ul>
</li>
	<li id="menu-item-280" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-1"><a href="shortcodes/typography/index.html">Shortcodes</a>
	<ul class="sub-menu">
		<li id="menu-item-277" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shortcodes/typography/index.html">Typography</a></li>
		<li id="menu-item-268" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shortcodes/buttons/index.html">Buttons</a></li>
		<li id="menu-item-269" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shortcodes/columns/index.html">Columns</a></li>
		<li id="menu-item-270" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shortcodes/fancy-boxes/index.html">Fancy Boxes</a></li>
		<li id="menu-item-3594" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shortcodes/service-boxes/index.html">Service Boxes</a></li>
		<li id="menu-item-272" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shortcodes/ordered-lists/index.html">Ordered Lists</a></li>
		<li id="menu-item-278" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shortcodes/unordered-lists/index.html">Unordered Lists</a></li>
		<li id="menu-item-273" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shortcodes/pricing-table/index.html">Pricing Table</a></li>
		<li id="menu-item-274" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shortcodes/progress-bars/index.html">Progress Bars</a></li>
		<li id="menu-item-275" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shortcodes/quotes/index.html">Quotes</a></li>
		<li id="menu-item-276" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shortcodes/tabs-toggles/index.html">Tabs &#038; Toggles</a></li>
		<li id="menu-item-271" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="shortcodes/miscellaneous/index.html">Miscellaneous</a></li>
	</ul>
</li>
	<li id="menu-item-4052" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-1"><a href="features/fully-responsive-design/index.html">Features</a>
	<ul class="sub-menu">
		<li id="menu-item-3077" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-2"><a href="features/3-types-of-headers/index.html">3 Types of Headers</a>
		<ul class="sub-menu">
			<li id="menu-item-3097" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-3"><a href="header-type1/index.html">Header Type1</a></li>
			<li id="menu-item-3096" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-3"><a href="header-type2/index.html">Header Type2</a></li>
			<li id="menu-item-3095" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-3"><a href="header-type3/index.html">Header Type3</a></li>
		</ul>
</li>
		<li id="menu-item-3078" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="features/fully-responsive-design/index.html">Fully Responsive Design</a></li>
		<li id="menu-item-3079" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="features/multi-news-page-options/index.html">Multi News Options</a></li>
		<li id="menu-item-3080" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="features/multi-gallery-page-options/index.html">Multi Gallery Options</a></li>
		<li id="menu-item-4015" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="features/valid-html5-and-css3/index.html">Valid HTML5 and CSS3</a></li>
		<li id="menu-item-3181" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-depth-2"><a href="#">This is Multi-level</a>
		<ul class="sub-menu">
			<li id="menu-item-3111" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-3"><a href="#">Level 2 &#8211; 1</a></li>
			<li id="menu-item-3112" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-depth-3"><a href="#">Level 2 &#8211; 2</a>
			<ul class="sub-menu">
				<li id="menu-item-3113" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-4"><a href="#">Level 3 &#8211; 1</a></li>
				<li id="menu-item-3114" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-4"><a href="#">Level 3 &#8211; 2</a></li>
			</ul>
</li>
		</ul>
</li>
		<li id="menu-item-3081" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="features/multi-shop-page-options/index.html">Multi Shop Options</a></li>
		<li id="menu-item-3082" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="features/tons-of-shortcodes/index.html">Tons of Shortcodes</a></li>
		<li id="menu-item-3083" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="features/unlimited-google-fonts/index.html">Unlimited Google Fonts</a></li>
	</ul>
</li>
	<li id="menu-item-27" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-1"><a href="contact/index.html">Contact</a>
	<ul class="sub-menu">
		<li id="menu-item-2776" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="contact/contact-form-7/index.html">Contact Form 7</a></li>
	</ul>
</li>
</ul>
</li>
<li id="menu-item-4140" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-0 menu-item-simple-parent "><a href="courses-overview/index.html"><span class='menu-icon fa fa-book'> </span>Courses</a>


<ul class="sub-menu">
	<li id="menu-item-4141" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-1"><a href="lesson/index.html">Lessons</a></li>
	<li id="menu-item-4139" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-1"><a href="my-courses/index.html">My Courses</a></li>
</ul>
</li>
<li id="menu-item-29" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-0 menu-item-megamenu-parent  megamenu-3-columns-group"><a href="news/index.html"><span class='menu-icon fa fa-pencil'> </span>News</a>
<div class='megamenu-child-container'>

<ul class="sub-menu">
	<li id="menu-item-2741" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-1"><a href="news/news-one-column/index.html">I Column</a>
	<ul class="sub-menu">
		<li id="menu-item-2750" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="news/news-one-column/index.html">Without Sidebar</a></li>
		<li id="menu-item-2742" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="news/news-one-column-with-left-sidebar/index.html">With Left Sidebar</a></li>
		<li id="menu-item-2743" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="news/news-one-column-with-right-sidebar/index.html">With Right Sidebar</a></li>
	</ul>
</li>
	<li id="menu-item-2747" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-1"><a href="news/news-two-column/index.html">II Column</a>
	<ul class="sub-menu">
		<li id="menu-item-2752" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="news/news-two-column/index.html">Without Sidebar</a></li>
		<li id="menu-item-2748" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="news/news-two-column-with-left-sidebar/index.html">With Left Sidebar</a></li>
		<li id="menu-item-2749" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="news/news-two-column-with-right-sidebar/index.html">With Right Sidebar</a></li>
	</ul>
</li>
	<li id="menu-item-3125" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-has-children menu-item-depth-1"><a href="top-6-e-learning-design-mistakes/index.html">News Details</a>
	<ul class="sub-menu">
		<li id="menu-item-3122" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-depth-2"><a href="top-6-e-learning-design-mistakes/index.html">Without Sidebar</a></li>
		<li id="menu-item-3123" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-depth-2"><a href="the-beginners-design-toolkit/index.html">With Left Sidebar</a></li>
		<li id="menu-item-3124" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-depth-2"><a href="valuable-corporate-training/index.html">With Right Sidebar</a></li>
	</ul>
</li>
</ul>

</div>
</li>
<li id="menu-item-26" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-0 menu-item-megamenu-parent  megamenu-4-columns-group"><a href="gallery/index.html"><span class='menu-icon fa fa-picture-o'> </span>Gallery</a>
<div class='megamenu-child-container'>

<ul class="sub-menu">
	<li id="menu-item-2700" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-1"><a href="gallery/gallery-two-column/index.html">II Column</a>
	<ul class="sub-menu">
		<li id="menu-item-2706" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="gallery/gallery-two-column/index.html">Without Sidebar</a></li>
		<li id="menu-item-2701" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="gallery/gallery-two-column-with-left-sidebar/index.html">With Left Sidebar</a></li>
		<li id="menu-item-2702" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="gallery/gallery-two-column-with-right-sidebar/index.html">With Right Sidebar</a></li>
	</ul>
</li>
	<li id="menu-item-2697" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-1"><a href="gallery/gallery-three-column/index.html">III Column</a>
	<ul class="sub-menu">
		<li id="menu-item-2705" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="gallery/gallery-three-column/index.html">Without Sidebar</a></li>
		<li id="menu-item-2698" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="gallery/gallery-three-column-with-left-sidebar/index.html">With Left Sidebar</a></li>
		<li id="menu-item-2699" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="gallery/gallery-three-column-with-right-sidebar/index.html">With Right Sidebar</a></li>
	</ul>
</li>
	<li id="menu-item-2691" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-1"><a href="gallery/gallery-four-column/index.html">IV Column</a>
	<ul class="sub-menu">
		<li id="menu-item-2703" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="gallery/gallery-four-column/index.html">Without Sidebar</a></li>
		<li id="menu-item-2692" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="gallery/gallery-four-column-with-left-sidebar/index.html">With Left Sidebar</a></li>
		<li id="menu-item-2693" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="gallery/gallery-four-column-with-right-sidebar/index.html">With Right Sidebar</a></li>
	</ul>
</li>
	<li id="menu-item-3115" class="menu-item menu-item-type-post_type menu-item-object-dt_galleries menu-item-has-children menu-item-depth-1"><a href="dt_galleries/learning-plans/index.html">Gallery Details</a>
	<ul class="sub-menu">
		<li id="menu-item-3119" class="menu-item menu-item-type-post_type menu-item-object-dt_galleries menu-item-depth-2"><a href="dt_galleries/learning-plans/index.html">Full-width Gallery</a></li>
		<li id="menu-item-3120" class="menu-item menu-item-type-post_type menu-item-object-dt_galleries menu-item-depth-2"><a href="dt_galleries/team-management/index.html">Left Gallery</a></li>
		<li id="menu-item-3121" class="menu-item menu-item-type-post_type menu-item-object-dt_galleries menu-item-depth-2"><a href="dt_galleries/content-management/index.html">Right Gallery</a></li>
	</ul>
</li>
</ul>

</div>
</li>
<!--<li id="menu-item-4657" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-0 menu-item-simple-parent "><a href="activity/index.html"><span class='menu-icon fa fa-rocket'> </span>Community</a>


<ul class="sub-menu">
	<li id="menu-item-2830" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-1"><a href="activity/index.html">Activity</a></li>
	<li id="menu-item-2829" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-depth-1"><a href="members/index.html">Members</a>
	<ul class="sub-menu">
		<li id="menu-item-2858" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="register/index.html">Register</a></li>
		<li id="menu-item-2857" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-2"><a href="activate/index.html">Activate</a></li>
	</ul>
</li>
	<li id="menu-item-2828" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-1"><a href="groups/index.html">Groups</a></li>
	<li id="menu-item-2831" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-depth-1"><a href="forums/index.html">Forums</a></li>
</ul>
</li>-->
</ul>                            </nav>
						</div>                            
                    </div>
                </div>
	  <!-- main menu container ends here -->
        </header>
        </div>