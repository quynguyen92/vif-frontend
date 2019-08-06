<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$primary_color   = RDTheme::$options['primary_color']; // #cb1011
$secondary_color = '#222222';
$primary_rgb     = RDTheme_Helper::hex2rgb( $primary_color ); // 0, 33, 71
$secondary_rgb   = RDTheme_Helper::hex2rgb( $secondery_color ); // 0, 33, 71

/*---------------------------------
INDEX
===================================
#. Common Style for VC
#. VC: Common Button
#. VC: Owl Nav 1
#. VC: Owl Nav 2
#. VC: Owl Nav 4
#. VC: Counter
#. VC: CTA
#. VC: About
#. VC: Service Slider 1
#. VC: Service Slider 2
#. VC: Service Slider 3
#. VC: Service Slider 5
#. VC: Section Title
#. VC: Info Text
#. VC: Team Slider
#. VC: Team Grid 01
#. VC: Team Grid 02
#. VC: Team Grid 03
#. VC: Service Grid 01
#. VC: Service Grid 03
#. VC: Service Grid 03
#. VC: Service Grid 06 & Service Slider 4
#. VC: Text with Image
#. VC: Testimonial
#. VC: Pricing Table 1
#. VC: Pricing Table 2
#. VC: Post
#. VC: Portfolio Grid
#. VC: Case Studies Grid
#. VC: Case Studies Slider
#. VC: Text With Video
#  VC: FAQ - Restyle
#. VC: Contact Info
#. VC: Tabs
#. VC: Text with Button 
#. VC: Logo Showcase
#. VC: Portfolio Grid , Isotope & Slider ( additional )
-------------------------------------*/
/*-------------------------------------
#. Common Style for VC
---------------------------------------*/ 
?>
.section-title h2:after {
  background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Common Button
---------------------------------------*/
?>
.entry-content .rdtheme-button-5:hover,
.rdtheme-button-5:hover {
  color: <?php echo esc_html($primary_color); ?>;
}
.entry-content .rdtheme-button-6,
.rdtheme-button-6 {
  border: 2px solid <?php echo esc_html($primary_color); ?>;
  color: <?php echo esc_html($secondary_color); ?>;
}
.entry-content .rdtheme-button-6:hover,
.rdtheme-button-6:hover {
  background: <?php echo esc_html($primary_color); ?>;
}
.entry-content .rdtheme-button-7,
.rdtheme-button-7 {
  border: 2px solid <?php echo esc_html($primary_color); ?>;
  color: <?php echo esc_html($primary_color); ?>;
}
.entry-content .rdtheme-button-7:hover,
.rdtheme-button-7:hover {
  background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Owl Nav 1
---------------------------------------*/
?>
.owl-theme .owl-controls .owl-prev {
  border: 1px solid <?php echo esc_html($primary_color); ?>;
}
.owl-theme .owl-controls .owl-next {
  border: 1px solid <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-1 .owl-carousel .owl-nav .owl-prev {
  border: 1px solid <?php echo esc_html($primary_color); ?>;
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-1 .owl-carousel .owl-nav .owl-prev:hover {
  background-color: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-1 .owl-carousel .owl-nav .owl-next {
  border: 1px solid <?php echo esc_html($primary_color); ?>;
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-1 .owl-carousel .owl-nav .owl-next:hover {
  background-color: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-1 .owl-carousel .owl-dots .owl-dot span:hover span {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-1 .owl-carousel .owl-dots .owl-dot.active span {
  background: <?php echo esc_html($primary_color); ?>;
}
/*owl nav: top position*/
.rt-owl-nav-3 .owl-custom-nav .owl-prev {
  color: <?php echo esc_html($primary_color); ?>;
  border: 1px solid <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-3 .owl-custom-nav .owl-prev:hover {
  background-color: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-3 .owl-custom-nav .owl-next {
  color: <?php echo esc_html($primary_color); ?>;
  border: 1px solid <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-3 .owl-custom-nav .owl-next:hover {
  background-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Owl Nav 2
---------------------------------------*/
?>
.rt-owl-nav-2.slider-nav-enabled .owl-carousel .owl-next,
.rt-owl-nav-2.slider-nav-enabled .owl-carousel .owl-prev {
  color: <?php echo esc_html($primary_color); ?>;
  border: 1px solid <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-2.slider-nav-enabled .owl-carousel .owl-prev:hover ,
.rt-owl-nav-2.slider-nav-enabled .owl-carousel .owl-next:hover {
  background-color: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-2.slider-dot-enabled .owl-carousel .owl-dot span:hover span ,
.rt-owl-nav-2.slider-dot-enabled .owl-carousel .owl-dot.active span {
  background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Owl Nav 4
---------------------------------------*/
?>
.rt-owl-nav-4 .owl-theme .owl-nav > div {
  background-color: transparent !important;
  color: <?php echo esc_html($secondary_color); ?>;
}
<?php
/*--------------------------------------
#. VC: Counter
---------------------------------------*/
?>
.rt-vc-counter .rtin-counter-content .rt-counter ,
.rt-vc-counter .rtin-counter-content .rtin-title {
  color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*--------------------------------------
#. VC: CTA
---------------------------------------*/
?>
.rt-cta {
  background: <?php echo esc_html($primary_color); ?>;
  padding: 45px 0 50px;
}
<?php
/*--------------------------------------
#. VC: About
---------------------------------------*/
?>
.rt-about-one .rtin-about-content-center .rtin-about-content h2:after {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-about-one .rtin-about-content-center .rtin-about-content h2 span {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-about-one .rtin-about-content-center .rtin-about-content h3.about-name {
  color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*--------------------------------------
#. VC: Service Slider 1
---------------------------------------*/
?>
.rt-service-layout-2 .rtin-single-feature-slide .rtin-feature-slide-content,
.rt-service-slider-one .rtin-single-feature-slide .rtin-feature-slide-content {
  background: rgba(<?php echo esc_html($primary_rgb); ?>, 0.8);
}
<?php
/*--------------------------------------
#. VC: Service Slider 2
---------------------------------------*/
?>
.rt-service-slider-two .section-title h2:after {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-service-slider-two .rtin-single-feature-slide:hover .rtin-feature-slide-content h3 a {
  color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*--------------------------------------
#. VC: Service Slider 3
---------------------------------------*/
?>
.rt-service-slider-three .rtin-single-feature-slide:hover h3 {
  background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*--------------------------------------
#. VC: Service Slider 5
---------------------------------------*/
?>
.rt-service-slider-five .rtin-single-service h3 a {
  background: rgba(<?php echo esc_html($primary_rgb); ?>, 0.8);
}
.rt-service-slider-five .rtin-single-service .overley ,
.rt-service-slider-five .rtin-single-service:hover h3 a {
  background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-----------------------
#. VC: Section Title
------------------------*/
?>
.rt-vc-title h2:after {
  background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Info Text
---------------------------------------*/
?>
.rt-info-text.layout1 i {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-info-text.layout2 i {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-info-text.layout3 i {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-info-text.layout3 i:after {
  background: rgba(<?php echo esc_html($primary_rgb); ?>, 0.8);
}
/*layout 4*/
.rt-info-text.layout4 i {
  color: <?php echo esc_html($primary_color); ?>;
}
/*layout 5*/
.rt-infobox-5 .rtin-single-info .rtin-info-item-icon {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-infobox-5 .rtin-single-info .rtin-info-item-icon h3 a {
  color: <?php echo esc_html($secondary_color); ?>;
}
/*layout 6*/
.rt-infobox-6 .rtin-info-icon {
	color: <?php echo esc_html($primary_color); ?>;
}
.rt-infobox-6 .rtin-info-icon:after {
  background: rgba(<?php echo esc_html($primary_rgb); ?>, 0.8);
}
.rt-infobox-6:hover .rtin-info-content h3 a ,
.rt-infobox-6:hover .rtin-info-content h3 {
  color: <?php echo esc_html($primary_color); ?>;
}
/*infobox layout 7*/
.rt-infobox-7 .rtin-single-info-item .rtin-single-info .rtin-info-content h3 a {
  color: <?php echo esc_html($secondary_color); ?>;
}
.rt-infobox-7 .rtin-single-info-item .rtin-single-info:hover .rtin-info-icon {
  color: <?php echo esc_html($secondary_color); ?>;
}
.rt-infobox-7 .rtin-single-info-item .rtin-single-info:hover .rtin-info-content h3 a {
  color: <?php echo esc_html($primary_color); ?> !important;
}
/*infobox layout 8*/
.rt-infobox-8 .media .media-left i {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-infobox-8 .media .media-body h3 {
  color: <?php echo esc_html($secondary_color); ?>;
  position: relative;
}
.rt-infobox-8 .media .media-body h3:after {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-infobox-8 .media .media-body h3 a {
  color: <?php echo esc_html($secondary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Team Slider
---------------------------------------*/
?>
.rt-team-slider-one .section-title h2:after {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-one .rtin-single-team .rtin-item-content h3 a:hover {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-one .rtin-single-team .rtin-item-content .position {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-one .rtin-single-team .rtin-item-content ul.social-icons li a {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-one .rtin-single-team .rtin-item-content ul.social-icons li a:hover {
  background: <?php echo esc_html($primary_color); ?>;
  border: 1px solid <?php echo esc_html($primary_color); ?>;
}
/*team slider 2*/
.rt-team-slider-two .rtin-single-team {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-two .rtin-single-team .rtin-item-content h3 a:hover {
  color: <?php echo esc_html($secondary_color); ?>;
}
.rt-team-grid-2 .rtin-single-team .rtin-item-content ul.social-icons li a {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-grid-2 .rtin-single-team .rtin-item-content ul.social-icons li a:hover {
  background: <?php echo esc_html($primary_color); ?>;
  border: 1px solid <?php echo esc_html($primary_color); ?>;
}
.rt-team-grid-2 .rtin-single-team:hover .rtin-item-content h3 a {
  color: <?php echo esc_html($primary_color); ?>;
}
/*team slider 3*/
.rt-team-slider-three .rtin-single-team {
  background: <?php echo esc_html($secondary_color); ?>;
}
.rt-team-slider-three .rtin-single-team .rtin-item-content .position {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-three .rtin-single-team:hover {
  background: <?php echo esc_html($primary_color); ?>;
}
/*team slider 4*/
.rt-team-slider-four .rtin-single-team .rtin-item-content h3 a:hover {
  color: <?php echo esc_html($primary_color); ?>;
}
/*team slider 5*/
.rt-team-slider-five .vc-item-wrap .vc-item .vc-overly {
  background-color: rgba(<?php echo esc_html($primary_rgb); ?>, 0.8);
}
.rt-team-slider-five .vc-item-wrap .vc-team-meta .name a {
  color: <?php echo esc_html($primary_color); ?>;
}
/*Team Slider 6*/
.rt-team-slider-six .rtin-team-slider-holder .tab-content .single-team .media-body h3.media-heading a:hover ,
.rt-team-slider-six .rtin-team-slider-holder .tab-content .single-team .media-body p.designation {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-six .rtin-team-slider-holder .tab-content .single-team .media-body .social-media-area ul li a {
  color: <?php echo esc_html($primary_color); ?>;
  border: 1px solid <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-six .rtin-team-slider-holder .tab-content .single-team .media-body .social-media-area ul li:hover a {
  background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*--------------------------------------
#. VC: Team Grid 01
---------------------------------------*/
?>
.rt-team-grid-1 .rtin-single-team .rtin-item-image a.plus-icon {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-team-grid-1 .rtin-single-team .rtin-item-content ul.social-icons li a {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-grid-1 .rtin-single-team .rtin-item-content ul.social-icons li a:hover {
  background: <?php echo esc_html($primary_color); ?>;
  border: 1px solid <?php echo esc_html($primary_color); ?>;
}

.rt-team-grid-1 .rtin-single-team:hover .rtin-item-content h3 a {
  color: <?php echo esc_html($primary_color); ?>;
}

<?php
/*--------------------------------------
#. VC: Team Grid 02
---------------------------------------*/
?>
.rt-team-grid-2 .rtin-single-team .rtin-item-image .rtin-plus-icon a:hover {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-grid-2 .rtin-single-team .rtin-item-content ul.social-icons li a {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-grid-2 .rtin-single-team .rtin-item-content ul.social-icons li a:hover {
  background: <?php echo esc_html($primary_color); ?>;
  border: 1px solid <?php echo esc_html($primary_color); ?>;
}
.rt-team-grid-2 .rtin-single-team:hover .rtin-item-content h3 a {
  color: <?php echo esc_html($primary_color); ?>;
}

<?php
/*-------------------------------------
#. VC: Team Grid 03
---------------------------------------*/
?>
.rt-team-grid-3 .rtin-single-team .rtin-item-image:after, 
.rt-team-layout-3 .rtin-single-team .rtin-item-image:after {
  background-image: linear-gradient(transparent, <?php echo esc_html($secondary_color); ?>), linear-gradient(transparent, <?php echo esc_html($secondary_color); ?>);
}
.rt-team-grid-3 .rtin-single-team .rtin-item-content ul.social-icons li a,
.rt-team-layout-3 .rtin-single-team .rtin-item-content ul.social-icons li a {
  color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Service Grid 01
---------------------------------------*/
?>
.rt-service-layout-1 .rtin-single-item .rtin-item-content h3 a {
  color: <?php echo esc_html($secondary_color); ?>;
}
.rt-service-layout-1 .rtin-single-item:hover .rtin-item-content h3 a {
  color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Service Grid 03
---------------------------------------*/
?>
.rt-service-layout-3 .rtin-single-item .rtin-item-content h3:after {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-service-layout-3 .rtin-single-item .rtin-item-content a.rdtheme-button-7 {
  color: <?php echo esc_html($primary_color); ?>;
  border: 1px solid <?php echo esc_html($primary_color); ?>;
}
.rt-service-layout-3 .rtin-single-item .rtin-item-content a.rdtheme-button-7:hover {
  border: 1px solid <?php echo esc_html($primary_color); ?>;
}
.rt-service-layout-3 .rtin-single-item .rtin-item-content a.rdtheme-button-7 i,
.rt-service-layout-3 .rtin-single-item:hover .rtin-item-content h3 a {
  color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Service Grid 05
---------------------------------------*/
?>.rt-service-layout-5 .rtin-single-item .rtin-item-content {
	background-color: rgba(<?php echo esc_html($primary_rgb); ?>, 0.8);
}
<?php
/*-------------------------------------
#. VC: Service Grid 06
---------------------------------------*/
?>
.entry-content .rt-service-layout-6 .rtin-icon-holder {
  color: <?php echo esc_html($primary_color); ?>;
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Text With Image
---------------------------------------*/
?>
.rt-text-with-image .rtin-text-part h2:after {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-text-with-image .rtin-text-part em {
  color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Testimonial
---------------------------------------*/
?>
.rt-testimonial-one .rtin-single-testimonial .rtin-testimo-info .rtin-testimo-title h3 {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-testimonial-two .rtin-single-testimonial .rtin-testimo-info .rtin-testimo-title h3 {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-testimonial-three .single-testimonial .pull-left i {
  background-color: <?php echo esc_html($primary_color); ?>;
}
.rt-testimonial-three .owl-dots .owl-dot.active span {
  background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Pricing Table 1
---------------------------------------*/
?>
.rt-price-table-box h3 {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-price-table-box .rtin-price-button a.btn-price-button {
  border: 2px solid <?php echo esc_html($primary_color); ?>;
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-price-table-box .rtin-price-button a.btn-price-button:hover {
  background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Pricing Table 2
---------------------------------------*/
?>
.entry-content .rt-price-table-box1 .price-holder {
  background: <?php echo esc_html($primary_color); ?>;
}
.entry-content .rt-price-table-box1 .pricetable-btn {
  background-color: <?php echo esc_html($primary_color); ?>;
}
<?php 
/*-------------------------------------
#. VC: Post
---------------------------------------*/
?>
.rt-post-vc-section-2 .rtin-single-post .rtin-item-image span.date,
.rt-post-vc-section-1 .rtin-single-post .rtin-item-image span.date {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-post-vc-section-1 .rtin-single-post:hover .rtin-item-info h3 a {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-post-vc-section-2 .rtin-single-post:hover .rtin-item-info h3 a {
  color: <?php echo esc_html($primary_color); ?>;
}
/*post style 3*/
.rt-post-vc-section-3 .rtin-single-post .pull-left a span {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-post-vc-section-3 .rtin-single-post .pull-left a:after {
  background: rgba(<?php echo esc_html($primary_rgb); ?>, 0.8);
}
.rt-post-vc-section-3 .rtin-single-post .media-body p.date a ,
.rt-post-vc-section-3 .rtin-single-post .media-body h3 a:hover {
  color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Portfolio Grid
---------------------------------------*/
?>
.rt-portfolio-layout-1 .rtin-single-item .rtin-item-content a.rtin-plus-icon {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-portfolio-layout-2 .rtin-single-item .rtin-item-image a.rtin-plus-icon {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-portfolio-layout-2 .rtin-single-item .rtin-item-content h3 a {
  color: <?php echo esc_html($secondary_color); ?>;
}
.rt-portfolio-layout-2 .rtin-single-item:hover .rtin-item-content h3 a {
  color: <?php echo esc_html($primary_color); ?>;
}
/*layout 3*/
.rt-portfolio-layout-3 .rtin-single-item .rtin-item-image .overlay {
  background: rgba(<?php echo esc_html($secondary_rgb); ?>, 0.8);
}
.rt-portfolio-layout-3 .rtin-single-item .rtin-item-image .overlay a.rtin-plus-icon {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-portfolio-layout-3 .rtin-single-item .rtin-item-content h3 a {
  color: <?php echo esc_html($secondary_color); ?>;
}
.rt-portfolio-layout-3 .rtin-single-item:hover .rtin-item-content h3 a {
  color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Case Studies Grid
---------------------------------------*/
?>
.rt-case-studies-box .rtin-case-item:hover .rtin-item-content-bottom h3 a,
.rt-case-studies-box .rtin-case-item:hover .rtin-item-content-top h3 a {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-case-studies-grid .rtin-single-item .rtin-item-content h3 a {
  color: <?php echo esc_html($secondary_color); ?>;
}
.rt-case-studies-grid .rtin-single-item:hover .rtin-item-content h3 a {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-case-studies-grid .rtin-single-item .rtin-item-content .rtin-read-more {
  border: 2px solid <?php echo esc_html($primary_color); ?>;
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-case-studies-grid .rtin-single-item .rtin-item-content .rtin-read-more:hover {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-case-studies-grid-2 .rtin-single-item .rtin-item-content {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-case-studies-grid-3 .rtin-single-item .rtin-item-image:after {
  background: rgba(<?php echo esc_html($primary_rgb); ?>, 0.8);
}
.rt-service-layout-4 .rtin-single-item .rtin-item-content h3 a,
.rt-case-studies-grid-3 .rtin-single-item .rtin-item-content h3 a {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-case-studies-grid-3 .rtin-single-item .rtin-item-content .rtin-read-more {
  border: 2px solid <?php echo esc_html($primary_color); ?>;
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-case-studies-grid-3 .rtin-single-item .rtin-item-content .rtin-read-more:hover {
  background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Case Studies Slider
---------------------------------------*/
?>
.rt-case-slider-one .rtin-single-team .rtin-item-content h3 a {
  color: <?php echo esc_html($primary_color); ?>;
}
/*Case Study slider 2*/
.rt-case-slider-two .rtin-single-team {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-case-slider-two .rtin-single-team .rtin-item-image:after {
  background: rgba(<?php echo esc_html($primary_rgb); ?>, 0.8);
}
<?php
/*-------------------------------------
#. VC: Text With Video
---------------------------------------*/
?>
.rt-text-with-video .rtin-text-content span {
  color: <?php echo esc_html($secondary_color); ?>;
}
.rt-text-with-video .rtin-text-content h2:after {
  background: <?php echo esc_html($primary_color); ?> none repeat scroll 0 0;
}
<?php
/*--------------------------------------
#. VC: FAQ - Restyle
---------------------------------------*/
?>
/*dark*/
.wpb-js-composer .vc_tta-style-classic.dark .vc_tta-panel.vc_active .vc_tta-panel-heading {
  background-color: <?php echo esc_html($primary_color); ?> !important;
}
/*Light*/
.wpb-js-composer .vc_tta-style-classic.light .vc_tta-panel .vc_tta-panel-title > a {
  color: <?php echo esc_html($secondary_color); ?> !important;
}
.wpb-js-composer .vc_tta-style-classic.light .vc_tta-panel.vc_active .vc_tta-panel-title > a {
  color: <?php echo esc_html($primary_color); ?> !important;
}
.wpb-js-composer .vc_tta-style-classic.light .vc_tta-panel.vc_active .vc_tta-panel-heading {
  color: <?php echo esc_html($primary_color); ?> !important;
}
<?php
/*--------------------------------------
#. VC: Contact Info
---------------------------------------*/
?>
.rt-contact-info h2:after {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-contact-info ul li i {
  color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*--------------------------------------
#. VC: Tabs
---------------------------------------*/
?>
.rt-tab-style .nav-tabs li a:hover {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-tab-style .nav-tabs li a i {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-tab-style .nav-tabs li.active a {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-tab-style .tab-content h2:after {
  background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*--------------------------------------
#. VC: Text with Button 
---------------------------------------*/
?>
.rt-text-with-btn a.ghost-btn {
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
.rt-text-with-btn a.ghost-btn:hover {
  background: <?php echo esc_html($primary_color); ?> !important;
  opacity: 0.7;
}
.rt-text-with-btn a.btn-default-big {
  background: <?php echo esc_html($primary_color); ?>;
}

.rt-text-w-btn a.ghost-btn {
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
.rt-text-w-btn a.ghost-btn:hover { 
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-text-w-btn a.btn-default-big {
  background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*--------------------------------------
#. VC: Logo Showcase
---------------------------------------*/
?>
.rt-wpls .wpls-carousel .slick-prev, .rt-wpls .wpls-carousel .slick-next {
	background-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*--------------------------------------------------------
#. VC: Portfolio Grid , Isotope & Slider ( additional )
---------------------------------------------------------*/
/*portfolio grid 4*/
?>
.rt-portfolio-layout-4.pfp-wrapper .pfp-layout8 .tlp-portfolio-thumb:hover .tlp-overlay,
.rt-portfolio-layout-4.pfp-wrapper .rt-isotope2 .tlp-portfolio-thumb:hover .tlp-overlay,
.rt-portfolio-slider-1.pfp-wrapper .pfp-carousel7 .tlp-portfolio-thumb:hover .tlp-overlay {
	background-color: rgba(<?php echo esc_html($primary_rgb); ?>, 0.80);
}
.rt-portfolio-layout-4.pfp-wrapper .pfp-layout8 .tlp-portfolio-thumb h3 a,
.rt-portfolio-layout-4.pfp-wrapper .rt-isotope2 .tlp-portfolio-thumb h3 a,
.rt-portfolio-slider-1.pfp-wrapper .pfp-carousel7 .tlp-portfolio-thumb h3 a {
	background: <?php echo esc_html($primary_color); ?>;
}