<?php
	session_start();
	
if(isset($_SESSION["kontrol"])){
	if($_SESSION["kontrol"]=="aleron" and $_SESSION["kullanici"]!="")
	{
		//		VT BAĞLANTISI
		include("vt.php");
	
		$sonuc=$_REQUEST["snc"];
					
			if(isset($_REQUEST["prsinif"])){				
				$gelen=$_REQUEST["prsinif"];							
				if($_REQUEST["prsinif"]!=0){
					$listele10=mysqli_query($baglan, "select * from siniflar_tbl where id=".$_REQUEST["prsinif"]);
					if($oku10=mysqli_fetch_assoc($listele10)){
						$sinID=$oku10["id"];
						$sinifadi=$oku10["sinif"];
					}
				}
			}else{
				$gelen=0;
				$sinID=0;
				$idimiz=0;
				$sinifadi=0;
			}
			
		if(isset($_POST["butonlar"])){
			$btndeg=$_POST["butonlar"];
		}else{
			$btndeg="kayit";
		}
		
				
		$bugun=date("l", strtotime(date("Y-m-d")));
		if($bugun=="Monday"){
			$pts=date("Y-m-d", strtotime("this week last monday"));		
			$pts=date("Y-m-d",strtotime("7 day", strtotime($pts)));
		}else{
			$pts=date("Y-m-d", strtotime("this week last monday"));		
		}				
		$sal=date("Y-m-d",strtotime("1 day", strtotime($pts)));
		$car=date("Y-m-d",strtotime("2 day", strtotime($pts)));
		$per=date("Y-m-d",strtotime("3 day", strtotime($pts)));
		$cum=date("Y-m-d",strtotime("4 day", strtotime($pts)));
		$cts=date("Y-m-d",strtotime("5 day", strtotime($pts)));
		$paz=date("Y-m-d",strtotime("6 day", strtotime($pts)));
										
		
?>
<!doctype html>
<html lang="tr-TR">
	
<head>
	        <title>ALERON - Dijital Pano</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Language" content="tr">
	<meta charset="utf-8">
    <meta name="author" content="ALERON">
    	<link rel="shortcut icon" href="assets/paye.ico">  
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">        
        
    <title>A. &Ccedil;. P. Yönetim Paneli</title>
    
<link rel='stylesheet' href='assets/fullcalendar.min.css'>
<link rel='stylesheet' href='assets/bootstrap.min.css'>
  
<style>
body {
    font-family: "Open Sans", sans-serif;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.8;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    -ms-text-size-adjust: 100%
}

a,
a:hover {
    -webkit-transition: all .3s;
    transition: all .3s;
    text-decoration: none;
    outline: 0
}

.btn:focus,
a:focus,
buttona:focus {
    box-shadow: none!important
}

.h1,
.h2,
.h3,
.h4,
.h5,
.h6,
h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Montserrat", sans-serif;
    font-weight: 700
}

.h1,
h1 {
    font-size: 36px
}

.h2,
h2 {
    font-size: 30px
}

.h3,
h3 {
    font-size: 24px
}

.h4,
h4 {
    font-size: 18px
}

.h5,
h5 {
    font-size: 14px
}

.h6,
h6 {
    font-size: 12px
}

body.fixed-nav {
    padding-top: 70px
}

.weight100 {
    font-weight: 100
}

.weight300 {
    font-weight: 300
}

.weight400 {
    font-weight: 400
}

.weight500 {
    font-weight: 500
}

.weight600 {
    font-weight: 600
}

.weight700 {
    font-weight: 700
}

#left-nav-toggler i,
.weight800 {
    font-weight: 800
}

.f12 {
    font-size: 12px
}

.f14 {
    font-size: 14px
}

.f16 {
    font-size: 16px
}

.f18 {
    font-size: 18px
}

.f24 {
    font-size: 24px
}

.f30 {
    font-size: 30px
}

.f50 {
    font-size: 50px
}

.f80 {
    font-size: 80px
}

.content-wrapper {
    position: relative;
    min-height: calc(100vh - 70px);
    padding-top: 2rem;
    padding-bottom: 56px;
    background: #f4f6f9
}

.navbar {
    padding: .89rem 1rem;
    border-bottom: 1px solid #e5e8eb;
    background: #fff;
    box-shadow: 0 1px 10px 1px rgba(115, 108, 203, .1)
}

.navbar-brand {
    padding: 0;
    text-transform: uppercase;
    color: #2f3c4b;
    font-family: "Montserrat", sans-serif;
    font-size: 16px;
    font-weight: 700;
    line-height: normal
}

.navbar-brand .page-direction {
    text-transform: capitalize;
    color: #949494
}

.b-mega-menu {
    position: fixed;
    z-index: 10;
    top: 10px;
    left: 10px;
    display: inline-block;
    width: 750px
}

.b-mega-menu .nav-pills .nav-link.active,
.b-mega-menu .nav-pills .show>.nav-link {
    position: relative;
    color: #141414;
    border-radius: 0;
    background-color: #f2f2f2
}

.b-mega-menu .nav-pills .nav-link.active:before,
.b-mega-menu .nav-pills .show>.nav-link:before,
.b-mega-menu-link li a:hover:before,
.b-mega-menu-link li.active a:before {
    position: absolute;
    top: 1rem;
    right: 1rem;
    content: "\f105";
    font-family: fontawesome
}

.b-mega-menu .nav-link {
    padding: 1rem;
    color: #737373
}

.b-mega-menu .widget-action-link {
    top: 0
}

.b-mega-menu .wal-nav-tabs {
    border: none
}

.b-mega-menu .wal-nav-tabs .nav-link {
    color: #c6c5c7;
    border: none;
    border-bottom: 2px solid transparent;
    font-size: 16px
}

.b-mega-menu .wal-nav-tabs .nav-link.active {
    color: #fe413b;
    border-bottom: 2px solid #fe413b;
    background-color: #fff
}

.b-mega-menu .wal-nav-tabs li a {
    padding: 1.25rem 1.5rem
}

.b-mega-menu .wal-nav-tabs li a:focus,
.b-mega-menu .wal-nav-tabs li a:hover {
    border-color: transparent
}

.b-mega-menu-link li a {
    position: relative;
    display: block;
    padding: 1rem;
    color: #737373
}

.b-mega-menu-link li a:hover,
.b-mega-menu-link li.active a {
    color: #141414;
    background-color: #f2f2f2
}

.header-links .notificaton-thumb img {
    position: relative;
    top: 6px;
    width: 35px;
    height: 35px;
    margin-right: 10px
}

.header-links .user-thumb img {
    position: relative;
    top: 0;
    width: 25px;
    height: 25px
}

.header-links .nav-link {
    color: #737373;
    font-size: 13px!important
}

.header-links .nav-link:hover,
.header-links .nav-link:hover:after {
    color: #7a86ff!important
}

.header-links .nav-link>i {
    position: relative;
    top: 4px;
    font-size: 18px
}

.header-links .dropdown-menu .dropdown-item {
    padding: .5rem 1.5rem;
    color: #737373;
    font-family: "Montserrat", sans-serif;
    font-size: 13px
}

.header-links .dropdown-menu .dropdown-item:hover {
    color: #7a86ff
}

@media (min-width:992px) {
    .header-links .nav-link {
        color: #737373;
        font-size: 13px!important
    }
    .header-links .nav-link:hover,
    .header-links .nav-link:hover:after {
        color: #7a86ff!important
    }
    .header-links .dropdown-menu {
        position: relative;
        top: 165%;
        width: 16rem;
        border: none;
        box-shadow: 0 0 30px 1px rgba(0, 0, 0, .1);
        -webkit-transform: scale3d(0, 0, 0);
        transform: scale3d(0, 0, 0);
        -webkit-transform-origin: top left;
        -ms-transform-origin: top left;
        transform-origin: top left;
        opacity: 1
    }
    .header-links .dropdown-menu.dropdown-menu-right:before,
    .header-links .dropdown-menu:before {
        position: absolute;
        top: -33px;
        left: 20px;
        content: "\e911";
        color: #fff;
        font-family: dashlab-icon;
        font-size: 35px
    }
    .header-links .dropdown-menu.dropdown-menu-right:before {
        right: 20px;
        left: auto
    }
    .header-links .dropdown-menu .dropdown-item {
        position: relative;
        padding: .5rem 1.5rem;
        color: #737373;
        font-family: "Montserrat", sans-serif;
        font-size: 13px
    }
    .header-links .dropdown-menu .dropdown-item:hover {
        color: #7a86ff
    }
    .header-links .dropdown-menu .dropdown-item .badge {
        position: absolute;
        top: 12px;
        right: 25px;
        padding: .3em .8em;
        border-radius: 2px
    }
    .header-links .show .dropdown-menu {
        -webkit-animation: tasi .2s;
        animation: tasi .2s;
        -webkit-animation-fill-mode: forwards;
        animation-fill-mode: forwards
    }
    .header-links .dropdown-menu-right {
        -webkit-transform-origin: top right;
        -ms-transform-origin: top right;
        transform-origin: top right
    }
    @-webkit-keyframes tasi {
        to {
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
            opacity: 1
        }
    }
    @keyframes tasi {
        to {
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
            opacity: 1
        }
    }
    .hide-arrow a:after {
        display: none;
        content: " "
    }
    .header-right-dropdown-width.dropdown-menu {
        width: 20rem
    }
    .header-right-dropdown-width.dropdown-menu .dropdown-item {
        padding: .8rem 1.5rem
    }
    .header-right-dropdown-width.dropdown-menu .msg-unread {
        background: #f4f6f9
    }
    .header-right-dropdown-width.dropdown-menu .dropdown-item:hover {
        color: #737373
    }
    .header-right-dropdown-width.dropdown-menu .dropdown-item:last-child:hover {
        border-radius: 0 0 .25rem .25rem
    }
    .notification-alarm {
        position: relative;
        top: -12px;
        right: -12px
    }
    .notification-alarm .dot {
        position: absolute;
        top: -10px;
        right: 6px;
        width: 6px;
        height: 6px;
        border-radius: 30px;
        background-color: #fe413b
    }
    .notification-alarm .wave {
        position: absolute;
        z-index: 10;
        top: -19px;
        right: -3px;
        width: 24px;
        height: 24px;
        -webkit-animation: wave 1s ease-out;
        -moz-animation: wave 1s ease-out;
        -o-animation: wave 1s ease-out;
        -webkit-animation-iteration-count: infinite;
        -moz-animation-iteration-count: infinite;
        -o-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
        border: 3px solid #949494;
        border-radius: 70px
    }
    .notification-alarm .wave.wave-danger {
        border: 3px solid #fe413b
    }
    .notification-alarm .wave.wave-warning {
        border: 3px solid #fab63f
    }
    @-webkit-keyframes wave {
        0% {
            -webkit-transform: scale(0);
            opacity: 0
        }
        25% {
            -webkit-transform: scale(.1);
            opacity: .1
        }
        50% {
            -webkit-transform: scale(.5);
            opacity: .3
        }
        75% {
            -webkit-transform: scale(.8);
            opacity: .5
        }
        to {
            -webkit-transform: scale(1);
            opacity: 0
        }
    }
}

#mainNav {
    font-family: "Montserrat", sans-serif
}

#mainNav .navbar-collapse {
    overflow: auto;
    max-height: 75vh
}

#mainNav .navbar-collapse .navbar-nav .nav-item .nav-link {
    position: relative;
    cursor: pointer;
    font-size: 14px
}

#mainNav .navbar-collapse .navbar-nav .nav-item .nav-link .badge {
    position: absolute;
    top: 19px;
    right: 18px;
    padding: .3em .8em;
    border-radius: 2px
}

@media (max-width:992px) {
    #mainNav .navbar-collapse .navbar-nav .nav-item .nav-link .badge {
        top: 12px;
        right: 0
    }
}

#mainNav .navbar-collapse .left-side-nav .nav-link-collapse:after {
    float: right;
    content: "\f107";
    font-family: "FontAwesome"
}

#mainNav .navbar-collapse .left-side-nav .nav-link-collapse.collapsed:after {
    content: "\f105"
}

#mainNav .navbar-collapse .left-side-nav .sidenav-second-level,
#mainNav .navbar-collapse .left-side-nav .sidenav-third-level {
    padding-left: 0
}

#mainNav .navbar-collapse .left-side-nav .sidenav-second-level>li>a,
#mainNav .navbar-collapse .left-side-nav .sidenav-third-level>li>a {
    display: block;
    padding: .5em 0
}

#mainNav .navbar-collapse .left-side-nav .sidenav-second-level>li>a:focus,
#mainNav .navbar-collapse .left-side-nav .sidenav-second-level>li>a:hover,
#mainNav .navbar-collapse .left-side-nav .sidenav-third-level>li>a:focus,
#mainNav .navbar-collapse .left-side-nav .sidenav-third-level>li>a:hover {
    text-decoration: none
}

#mainNav .navbar-collapse .left-side-nav .sidenav-second-level>li>a {
    padding-left: 2.5rem
}

#mainNav .navbar-collapse .left-side-nav .sidenav-third-level>li>a {
    padding-left: 3.5rem
}

#mainNav .navbar-collapse .sidenav-toggler {
    display: none
}

#mainNav .navbar-collapse .navbar-nav>.nav-item.dropdown>.nav-link {
    position: relative;
    min-width: 45px
}

#mainNav .navbar-collapse .navbar-nav>.nav-item.dropdown>.nav-link:after {
    float: right;
    width: auto;
    content: "\f107";
    border: none;
    font-family: "FontAwesome"
}

#mainNav .navbar-collapse .navbar-nav>.nav-item.dropdown>.nav-link .indicator {
    position: absolute;
    top: 5px;
    left: 21px;
    font-size: 10px
}

#mainNav .navbar-collapse .navbar-nav>.nav-item.dropdown.show>.nav-link:after {
    content: "\f107"
}

#mainNav .navbar-collapse .navbar-nav>.nav-item.dropdown .dropdown-menu>.dropdown-item>.dropdown-message {
    overflow: hidden;
    max-width: none;
    text-overflow: ellipsis
}

@media (min-width:992px) {
    #mainNav .navbar-brand,
    #mainNav .navbar-collapse .left-side-nav>.nav-item .sidenav-second-level>li,
    #mainNav .navbar-collapse .left-side-nav>.nav-item .sidenav-third-level>li {
        width: 250px
    }
    #mainNav .navbar-collapse {
        overflow: visible;
        max-height: none
    }
    #mainNav .navbar-collapse .left-side-nav {
        position: absolute;
        top: 0;
        left: 0;
        overflow-x: hidden;
        overflow-y: auto;
        flex-direction: column;
        margin-top: 70px;
        -webkit-box-direction: normal;
        -webkit-box-orient: vertical;

        -webkit-flex-direction: column;
        -ms-flex-direction: column
    }
    #mainNav .navbar-collapse .left-side-nav>.nav-item {
        width: 250px;
        padding: 0
    }
    #mainNav .navbar-collapse .left-side-nav>.nav-item>.nav-link {
        padding: 1em 1.1rem
    }
    #mainNav .navbar-collapse .left-side-nav>.nav-item .sidenav-second-level,
    #mainNav .navbar-collapse .left-side-nav>.nav-item .sidenav-third-level {
        padding-left: 0;
        list-style: none
    }
    #mainNav .navbar-collapse .left-side-nav>.nav-item .sidenav-second-level>li>a,
    #mainNav .navbar-collapse .left-side-nav>.nav-item .sidenav-third-level>li>a {
        padding: .5em 1.1rem
    }
    #mainNav .navbar-collapse .left-side-nav>.nav-item .sidenav-second-level>li>a {
        padding-left: 4em
    }
    #mainNav .navbar-collapse .left-side-nav>.nav-item .sidenav-third-level>li>a {
        padding-left: 5em
    }
    #mainNav .navbar-collapse .navbar-nav>.nav-item.dropdown>.nav-link {
        min-width: 0
    }
    #mainNav .navbar-collapse .navbar-nav>.nav-item.dropdown>.nav-link:after {
        width: 24px;
        text-align: center
    }
    #mainNav .navbar-collapse .navbar-nav>.nav-item.dropdown .dropdown-menu>.dropdown-item>.dropdown-message {
        max-width: 300px
    }
    #mainNav .navbar-collapse .left-side-nav .nav-item-search .search-form {
        padding: 0
    }
}

#mainNav.fixed-top .sidenav-toggler {
    display: none
}

#mainNav.fixed-top .left-side-nav .nav-link i {
    padding-right: 1rem;
    padding-left: .2rem
}

#mainNav .navbar-collapse .left-side-nav .nav-item-search .search-form {
    width: 88%;
    padding: 6px 10px;
    border: 1px solid #e5e8eb;
    border-radius: 4px;
    outline: none
}

@media (min-width:992px) {
    #mainNav.fixed-top .left-side-nav {
        height: calc(100vh - 123px);
        border-right: 1px solid #e5e8eb;
        box-shadow: 0 1px 10px 1px rgba(0, 0, 0, .05)
    }
    #mainNav.fixed-top .left-side-nav .nav-link i {
        position: relative;
        top: 3px;
        left: -3px;
        padding-right: 1rem;
        padding-left: .2rem;
        font-size: 1.2rem
    }
    #mainNav.fixed-top .sidenav-toggler {
        position: absolute;
        top: 0;
        left: 0;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        overflow-x: hidden;
        overflow-y: auto;
        flex-direction: column;
        margin-top: calc(100vh - 53px);
        -webkit-box-direction: normal;
        -webkit-box-orient: vertical;
        -webkit-flex-direction: column;
        -ms-flex-direction: column
    }
    #mainNav.fixed-top .sidenav-toggler>.nav-item {
        width: 251px;
        padding: 0
    }
    @-moz-document url-prefix() {
        #mainNav.fixed-top .sidenav-toggler>.nav-item {
            width: 258px;
            padding: 0
        }
    }
    #mainNav.fixed-top .sidenav-toggler>.nav-item>.nav-link {
        padding: 1em;
        border-top: 1px solid #e5e8eb;
        border-right: 1px solid #e5e8eb
    }
    #mainNav .navbar-collapse .left-side-nav .nav-item-search {
        padding: .5rem;
        border-bottom: 1px solid #e5e8eb;
        box-shadow: 0 1px 10px 1px rgba(115, 108, 203, .1)
    }
    #mainNav .navbar-collapse .left-side-nav .nav-item-search .search-form {
        width: 80%;
        padding: 0;
        border: none;
        outline: none;
        background: 0 0
    }
    #mainNav .navbar-collapse .left-side-nav .nav-item-search .nav-link {
        padding: .4rem .5rem
    }
}

#mainNav .navbar-collapse .left-side-nav .nav-item-search .nav-link-collapse.collapsed:after {
    content: " "
}

#mainNav.fixed-top.navbar-dark .sidenav-toggler {
    background-color: #3a4358
}

#mainNav.fixed-top.navbar-dark .sidenav-toggler a i {
    color: #737a8d
}

#mainNav.fixed-top.navbar-light .sidenav-toggler {
    background-color: #fff
}

#mainNav.fixed-top.navbar-light .sidenav-toggler a i {
    color: rgba(0, 0, 0, .5)
}

body.left-side-toggled #mainNav.fixed-top .sidenav-toggler {
    overflow-x: hidden;
    width: 55px
}

body.left-side-toggled #mainNav.fixed-top #left-nav-toggler i,
body.left-side-toggled #mainNav.static-top #left-nav-toggler i {
    -webkit-transform: scaleX(-1);
    -ms-transform: scaleX(-1);
    transform: scaleX(-1);
    -webkit-filter: FlipH;
    -ms-filter: "FlipH";
    filter: FlipH
}

#mainNav.static-top .sidenav-toggler,
.left-side-nav-tooltip.show,
body.left-side-toggled .left-side-nav .nav-item:after,
body.left-side-toggled .left-side-nav .nav-link-text,
body.left-side-toggled .left-side-nav .nav-link:after {
    display: none
}

@media (min-width:992px) {
    #mainNav.static-top .sidenav-toggler {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex
    }
    .content-wrapper {
        margin-left: 250px
    }
    @-moz-document url-prefix() {
        .content-wrapper {
            margin-left: 258px
        }
    }
    body.left-side-toggled .content-wrapper {
        margin-left: 55px
    }
}

body.left-side-toggled .left-side-nav {
    overflow-x: hidden;
    width: 55px
}

body.left-side-toggled #mainNav.fixed-top .sidenav-toggler .nav-item,
body.left-side-toggled #mainNav.fixed-top .sidenav-toggler .nav-link,
body.left-side-toggled .left-side-nav .nav-item,
body.left-side-toggled .left-side-nav .nav-link {
    width: 55px!important
}

body.left-side-toggled .left-side-nav-tooltip.show {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex
}

#mainNav.navbar-dark .navbar-collapse .left-side-nav .nav-link-collapse:after,
#mainNav.navbar-dark .navbar-collapse .left-side-nav>.nav-item .sidenav-second-level>li>a,
#mainNav.navbar-dark .navbar-collapse .left-side-nav>.nav-item .sidenav-third-level>li>a,
#mainNav.navbar-dark .navbar-collapse .left-side-nav>.nav-item>.nav-link {
    color: #737a8d
}

#mainNav.navbar-dark .navbar-collapse .left-side-nav>.nav-item>.nav-link:hover,
#mainNav.navbar-dark .navbar-collapse .left-side-nav>.nav-item>.nav-link:hover:after {
    color: #7a86ff
}

#mainNav.navbar-dark .navbar-collapse .left-side-nav>.nav-item .sidenav-second-level>li>a:focus,
#mainNav.navbar-dark .navbar-collapse .left-side-nav>.nav-item .sidenav-second-level>li>a:hover,
#mainNav.navbar-dark .navbar-collapse .left-side-nav>.nav-item .sidenav-third-level>li>a:focus,
#mainNav.navbar-dark .navbar-collapse .left-side-nav>.nav-item .sidenav-third-level>li>a:hover {
    color: rgba(255, 255, 255, .5);
    background: rgba(229, 229, 229, .05)
}

#mainNav.navbar-dark .navbar-collapse .navbar-nav>.nav-item.dropdown>.nav-link:after {
    color: #adb5bd
}

.navbar-dark .navbar-brand,
.navbar-dark .navbar-brand:hover {
    color: #303c4a
}

@media (min-width:992px) {
    #mainNav.navbar-dark .navbar-collapse .left-side-nav,
    #mainNav.navbar-dark .navbar-collapse .left-side-nav>.nav-item .sidenav-second-level,
    #mainNav.navbar-dark .navbar-collapse .left-side-nav>.nav-item .sidenav-third-level {
        background: #30384c
    }
    #mainNav.navbar-dark .navbar-collapse .left-side-nav li.active a {
        color: #7a86ff!important
    }
    #mainNav.navbar-dark .navbar-collapse .left-side-nav li.active a:focus,
    #mainNav.navbar-dark .navbar-collapse .left-side-nav li.active a:hover {
        color: #fff
    }
    #mainNav.navbar-dark .navbar-collapse .left-side-nav .nav-item-search {
        border-bottom: none;
        background-color: rgba(255, 255, 255, .05);
        box-shadow: none
    }
    #mainNav.navbar-dark.fixed-top .left-side-nav {
        border: none;
        box-shadow: none
    }
    #mainNav.navbar-dark.fixed-top .sidenav-toggler>.nav-item>.nav-link {
        border: none
    }
    #mainNav.navbar-dark .navbar-collapse .left-side-nav .nav-item-search .nav-link,
    #mainNav.navbar-dark .navbar-collapse .left-side-nav .nav-item-search .search-form {
        color: #737a8d
    }
    #mainNav.navbar-dark .navbar-collapse .left-side-nav .nav-item-search .search-form:-moz-placeholder {
        opacity: 1;
        color: #737a8d
    }
    #mainNav.navbar-dark .navbar-collapse .left-side-nav .nav-item-search .search-form::-moz-placeholder {
        opacity: 1
    }
    #mainNav.navbar-dark .navbar-collapse .left-side-nav .nav-item-search .search-form:-ms-input-placeholder,
    #mainNav.navbar-dark .navbar-collapse .left-side-nav .nav-item-search .search-form::-ms-input-placeholder {
        color: #737a8d
    }
    #mainNav.navbar-dark .navbar-collapse .left-side-nav .nav-item-search .search-form::-webkit-input-placeholder {
        color: #737a8d
    }
    #mainNav.navbar-dark .navbar-collapse .left-side-nav .nav-item-search .search-form::-moz-placeholder {
        color: #737a8d
    }
    #mainNav.navbar-dark .navbar-collapse .left-side-nav .nav-item-search .search-form::placeholder {
        color: #737a8d
    }
    #mainNav.navbar-dark.fixed-top .sidenav-toggler>.nav-item {
        width: 250px;
        padding: 0
    }
    .navbar-dark+.content-wrapper {
        margin-left: 250px
    }
    @-moz-document url-prefix() {
        .navbar-dark+.content-wrapper {
            margin-left: 256px
        }
        #mainNav.navbar-dark.fixed-top .sidenav-toggler>.nav-item {
            width: 256px
        }
        #mainNav.navbar-dark .navbar-collapse .left-side-nav {
            left: -1px
        }
        body.left-side-toggled #mainNav.navbar-dark.fixed-top .sidenav-toggler {
            width: 54px
        }
        body.left-side-toggled .content-wrapper {
            margin-left: 54px
        }
    }
    .navbar-dark .navbar-nav .nav-link,
    .navbar-dark .navbar-nav .nav-link:focus,
    .navbar-dark .navbar-nav .nav-link:hover {
        color: inherit
    }
}

#mainNav.navbar-light .navbar-collapse .left-side-nav>.nav-item .sidenav-second-level>li>a,
#mainNav.navbar-light .navbar-collapse .left-side-nav>.nav-item .sidenav-third-level>li>a,
#mainNav.navbar-light .navbar-collapse .left-side-nav>.nav-item>.nav-link {
    color: #737373
}

#mainNav.navbar-light .navbar-collapse .left-side-nav>.nav-item>.nav-link:hover {
    color: #7a86ff
}

#mainNav.navbar-light .navbar-collapse .left-side-nav>.nav-item .sidenav-second-level>li>a:focus,
#mainNav.navbar-light .navbar-collapse .left-side-nav>.nav-item .sidenav-second-level>li>a:hover,
#mainNav.navbar-light .navbar-collapse .left-side-nav>.nav-item .sidenav-third-level>li>a:focus,
#mainNav.navbar-light .navbar-collapse .left-side-nav>.nav-item .sidenav-third-level>li>a:hover {
    color: #141414;
    background: #f8f9fa
}

#mainNav.navbar-light .navbar-collapse .navbar-nav>.nav-item.dropdown>.nav-link:after,
.widget-action-link a.text-secondary:hover {
    color: #141414
}

@media (min-width:992px) {
    #mainNav.navbar-light .navbar-collapse .left-side-nav li.active a {
        color: #7a86ff!important
    }
    #mainNav.navbar-light .navbar-collapse .left-side-nav li.active a:focus,
    #mainNav.navbar-light .navbar-collapse .left-side-nav li.active a:hover {
        color: #000
    }
    #mainNav.navbar-light .navbar-collapse .left-side-nav>.nav-item .sidenav-second-level,
    #mainNav.navbar-light .navbar-collapse .left-side-nav>.nav-item .sidenav-third-level {
        background: #fff
    }
}

@media (max-width:992px) {
    .hide-arrow.navbar-nav>.nav-item.dropdown>.nav-link:after {
        display: none
    }
    .navbar-dark .navbar-toggler,
    .navbar-light .navbar-toggler {
        border-color: transparent;
        outline: none
    }
    .navbar-dark .navbar-toggler-icon,
    .navbar-light .navbar-toggler-icon {
        width: 24px;
        background-image: url(../img/hamburger-icon.svg)
    }
    .navbar-dark .navbar-nav .nav-link {
        color: #9fa4b1
    }
}

@media (max-width:767px) {
    .jq-dropdown {
        display: none!important
    }
}

@media (min-width:992px) {
    .leftnav-floating .content-wrapper {
        padding-top: 1.6rem;
        margin-left: 275px
    }
    body.left-side-toggled.leftnav-floating .content-wrapper {
        margin-left: 80px
    }
    .leftnav-floating {
        background: #f4f6f9
    }
    .leftnav-floating #mainNav.navbar-dark .navbar-collapse .left-side-nav {
        background: #30384c
    }
    .leftnav-floating #mainNav.navbar-dark.fixed-top .sidenav-toggler {
        border-top: none
    }
    .leftnav-floating #mainNav .navbar-collapse .left-side-nav {
        top: 25px;
        left: 25px
    }
    .leftnav-floating #mainNav.fixed-top .sidenav-toggler>.nav-item>.nav-link {
        border: none
    }
    .leftnav-floating #mainNav.fixed-top .sidenav-toggler>.nav-item {
        width: 250px
    }
    .leftnav-floating #mainNav.fixed-top .left-side-nav {
        height: calc(100vh - 173px);
        border: 1px solid #e5e8eb;
        border-radius: 5px 5px 0 0;
        background: #fff;
        box-shadow: 0 1px 10px 1px rgba(0, 0, 0, .05)
    }
    .leftnav-floating #mainNav.fixed-top .sidenav-toggler {
        top: -26px;
        left: 25px;
        border: 1px solid #e5e8eb;
        border-radius: 0 0 5px 5px;
        box-shadow: 0 1px 10px 1px rgba(0, 0, 0, .05)
    }
    .leftnav-floating footer.sticky-footer {
        border: none;
        background: 0 0
    }
    @-moz-document url-prefix() {
        .leftnav-floating #mainNav.fixed-top .sidenav-toggler>.nav-item {
            width: 257px
        }
        body.left-side-toggled #mainNav.navbar-dark.fixed-top .sidenav-toggler {
            width: 55px
        }
    }
}

@media (max-width:991px) {
    body.left-side-toggled .left-side-nav,
    body.left-side-toggled .left-side-nav .nav-item,
    body.left-side-toggled .left-side-nav .nav-link {
        width: 100%!important
    }
    body.left-side-toggled .left-side-nav .nav-link-text {
        display: inline-block
    }
}

footer.sticky-footer {
    position: absolute;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 51px;
    border-top: 1px solid #e5e8eb;
    background-color: #fff;
    line-height: 51px
}

.equal-height {
    height: calc(100% - 0px)
}

.custom-title-wrap {
    margin-top: 10px;
    margin-left: -1.25rem;
    padding-left: 1.25rem;
    border-left: 2px solid #e5e8eb
}

.custom-title-wrap .custom-title {
    color: #2f3c4b;
    font-family: "Montserrat", sans-serif;
    font-size: 14px;
    font-weight: 600
}

.custom-title-wrap .custom-post-title {
    color: #949494;
    font-size: 12px
}

.bar-primary {
    border-color: #7a86ff
}

.bar-info {
    border-color: #328dff
}

.bar-success {
    border-color: #3dba6f
}

.bar-warning {
    border-color: #fab63f
}

.bar-danger {
    border-color: #fe413b
}

.bar-turquoise {
    border-color: #31c3b2
}

.bar-pink {
    border-color: #ec0080
}

.creative-state-area {
    position: relative;
    top: -2.1rem;
    padding: 2rem;
    color: #fff;
    background: #2f3c4c
}

.creative-state-area .short-states span {
    text-transform: uppercase;
    color: rgba(255, 255, 255, .5);
    font-size: 10px
}

.creative-state-title {
    margin-bottom: 2rem;
    font-weight: 500
}

.creative-state-icon,
.creative-state-info {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    flex-direction: column;
    -webkit-box-direction: normal;
    -webkit-box-orient: vertical;
    -webkit-box-pack: center;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center
}

.creative-state-icon {
    margin-top: 12px;
    width: 25%;
    min-height: 132px;
    border-radius: 5px 0 0 5px
}

.creative-state-icon i {
    font-size: 40px
}

.creative-state-info {
    position: relative;
    width: 75%;
    min-height: 150px;
    border-radius: 5px;
    background: #fff
}

.creative-state-info h3 {
    color: #2f3c4b
}

.creative-state-info p,
.progress-title span {
    text-transform: uppercase;
    font-family: "Montserrat", sans-serif
}

.creative-state-info p {
    color: #949494;
    font-size: 12px
}

.creative-state-info .widget-action-link {
    top: 10px
}

.widget-action-link {
    position: absolute;
    top: 20px;
    right: 20px
}

#font-icons h6,
.widget-action-link .btn i {
    font-size: 14px
}

.widget-action-link a.text-secondary {
    color: #9f9f9f!important
}

.state-shadow {
    box-shadow: 0 0 30px 1px rgba(0, 0, 0, .1)
}

.text-dim,
a.more-list {
    color: #9f9f9f
}

.text-dim:hover,
a.more-list:hover {
    color: #141414
}

.widget-active-user h5 {
    padding-bottom: 10px;
    font-weight: 500
}

.widget-active-user .b-b1 {
    border-bottom: 1px solid rgba(255, 255, 255, .3)
}

.widget-active-user .active-page-link li {
    position: relative
}

.widget-active-user .active-page-link small {
    opacity: .8
}

.widget-active-user .active-page-link span {
    position: absolute;
    top: 4px;
    right: 0;
    font-size: 11px
}

.basic-gradient {
    background: #328dff;
    background: -webkit-linear-gradient(135deg, #3d74f1, #9986ee);
    background: linear-gradient(-45deg, #3d74f1, #9986ee)
}

.basic-gradient-alt {
    background: #328dff;
    background: -webkit-linear-gradient(bottom, #7279f7, #a37efc);
    background: linear-gradient(0deg, #7279f7, #a37efc)
}

.bubble-shadow,
.bubble-shadow-md,
.bubble-shadow-small {
    position: relative;
    overflow: hidden
}

.bubble-shadow:after,
.bubble-shadow:before {
    position: absolute;
    top: -10%;
    right: -140px;
    width: 300px;
    height: 300px;
    content: "";
    border-radius: 50%;
    background: rgba(255, 255, 255, .05)
}

.bubble-shadow:after {
    right: 80px;
    width: 200px;
    height: 200px
}

.bubble-shadow-md:after,
.bubble-shadow-md:before,
.bubble-shadow-small:after,
.bubble-shadow-small:before {
    position: absolute;
    top: -70%;
    right: -40%;
    width: 80px;
    height: 80px;
    content: "";
    border-radius: 50%;
    background: rgba(255, 255, 255, .1)
}

.bubble-shadow-md:after,
.bubble-shadow-md:before,
.bubble-shadow-small:after {
    top: -65%;
    right: 40%;
    width: 70px;
    height: 70px
}

.bubble-shadow-md:after,
.bubble-shadow-md:before {
    top: -30%;
    right: -25%;
    width: 80px;
    height: 80px
}

.bubble-shadow-md:after {
    top: -25%;
    right: 30%;
    width: 70px;
    height: 70px
}

.map-wrapper {
    position: relative;
    width: 100%;
    height: 250px;
    margin-top: 20px
}

.jqvmap-zoomin,
.jvectormap-zoomin {
    position: absolute;
    z-index: 10;
    top: 0;
    left: 0;
    -webkit-transition: all .3s;
    transition: all .3s
}

.jqvmap-zoomin:hover,
.jqvmap-zoomout:hover,
.jvectormap-zoomin:hover,
.jvectormap-zoomout:hover {
    -webkit-transition: all .3s;
    transition: all .3s;
    color: #fff;
    border-color: #328dff;
    background: #328dff
}

.jqvmap-zoomout,
.jvectormap-zoomout {
    position: absolute;
    z-index: 10;
    top: 30px;
    left: 0
}

.jqvmap-zoomin,
.jqvmap-zoomout,
.jvectormap-zoomin,
.jvectormap-zoomout {
    width: 25px;
    height: 25px;
    cursor: pointer;
    text-align: center;
    color: #737373;
    border: 1px solid #e5e8eb;
    border-radius: 50%;
    background: #fff;
    line-height: 17px
}

.jvectormap-label {
    position: absolute;
    z-index: 11;
    display: none;
    padding: 3px 5px;
    color: #fff;
    border: none;
    border-radius: 3px;
    background: rgba(0, 0, 0, .8);
    font-size: 12px
}

.progress-title {
    margin-bottom: 15px;
    color: #737373
}

.progress-title span {
    font-size: 11px;
    font-weight: 500
}

.list-widget h6,
.list-widget strong {
    font-family: "Montserrat", sans-serif;
    font-size: 11px;
    font-weight: 600
}

.list-widget span,
.nav-pills-sm .nav-link {
    font-family: "Montserrat", sans-serif;
    font-size: 12px
}

.list-widget .media img {
    width: 40px;
    height: 40px
}

.list-widget-border {
    padding-bottom: 20px;
    border-bottom: 1px solid #e5e8eb
}

.nav-pills-sm .nav-link {
    padding: .3em 1em;
    text-transform: uppercase;
    font-size: 10px
}

.nav-pill-custom .nav-link,
.nav-pills-sm .nav-link {
    border-radius: 30px!important
}

.nav-pill-custom .nav-link {
    color: #949494
}

.nav-pills.nav-pill-turquoise .nav-link.active,
.nav-pills.nav-pill-turquoise .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #31c3b2
}

.nav-pills.nav-pill-primary .nav-link.active,
.nav-pills.nav-pill-primary .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #328dff
}

.nav-pills.nav-pill-secondary .nav-link.active,
.nav-pills.nav-pill-secondary .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #737373
}

.nav-pills.nav-pill-success .nav-link.active,
.nav-pills.nav-pill-success .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #3dba6f
}

.nav-pills.nav-pill-danger .nav-link.active,
.nav-pills.nav-pill-danger .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #fe413b
}

.nav-pills.nav-pill-warning .nav-link.active,
.nav-pills.nav-pill-warning .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #fab63f
}

.nav-pills.nav-pill-info .nav-link.active,
.nav-pills.nav-pill-info .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #18b9d4
}

#flotTip,
.nav-pills.nav-pill-dark .nav-link.active,
.nav-pills.nav-pill-dark .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #2f3c4b
}

.btn-ordering {
    position: relative;
    width: 25px;
    height: 25px;
    text-align: center;
    border-radius: 50%;
    font-size: 12px
}

.btn-ordering i {
    position: absolute;
    top: 7px;
    left: 7px
}

.sr-icon-box,
.sr-icon-box-lg,
.st-alphabet {
    text-align: center;
    color: #fff;
    font-weight: 800
}

.st-alphabet {
    position: relative;
    width: 40px;
    height: 40px;
    line-height: 40px
}

.st-alphabet .status {
    position: absolute;
    right: 0;
    bottom: 3px;
    width: 10px;
    height: 10px;
    border: 2px solid #fff;
    border-radius: 50%
}

.sr-icon-box,
.sr-icon-box-lg {
    width: 60px;
    height: 60px;
    line-height: 66px
}

.sr-icon-box i {
    font-size: 25px;
    font-weight: 700
}

.sr-icon-box-lg {
    width: 90px;
    height: 90px;
    line-height: 108px
}

.sr-icon-box-lg i {
    font-size: 35px;
    font-weight: 700
}

.water-mark-text {
    position: absolute;
    bottom: -35px;
    left: 5%;
    color: #f8f8f8;
    font-size: 145px;
    font-weight: 700;
    line-height: normal
}

@media (max-width:1024px) {
    .water-mark-text {
        display: none
    }
}

.c3-chart-arcs-title {
    font-weight: 700
}

.fchart-height {
    top: 0;
    left: 0;
    width: 100%;
    height: 150px
}

#flotTip {
    z-index: 100;
    padding: 3px 5px;
    opacity: .8;
    background-color: #000;
    filter: alpha(opacity=85)
}

.notification-widget li {
    cursor: pointer
}

.notification-widget li:hover {
    background: #fafafa
}

.base-timeline {
    padding-left: 20px;
    border-left: 1px solid #e5e8eb
}

.base-timeline li {
    position: relative;
    margin-bottom: 20px
}

.base-timeline li:before {
    position: absolute;
    top: 4px;
    left: -1.6rem;
    content: "\f1db";
    color: #c6c5c7;
    background: #fff;
    font-family: fontawesome;
    font-size: 12px;
    font-weight: 700
}

.base-timeline li:last-child {
    margin-bottom: 0
}

.base-timeline .time-dot-primary:before {
    color: #328dff
}

.base-timeline .time-dot-success:before {
    color: #3dba6f
}

.base-timeline .time-dot-danger:before {
    color: #fe413b
}

.base-timeline .time-dot-warning:before {
    color: #fab63f
}

.base-timeline .time-dot-info:before {
    color: #18b9d4
}

.base-timeline .time-dot-dark:before {
    color: #2f3c4b
}

.base-timeline .time-dot-purple:before {
    color: #7a86ff
}

.base-timeline .time-dot-purple-light:before {
    color: #b756ff
}

.base-timeline .time-dot-turquoise:before {
    color: #31c3b2
}

.base-timeline .time-dot-pink:before {
    color: #ec0080
}

.todo-list-item {
    padding-left: 0
}

.todo-list-item li {
    position: relative;
    margin-bottom: 5px;
    padding: 13px;
    list-style: none;
    cursor: move;
    border: 1px solid #e5e8eb;
    border-radius: 4px;
    background: #fff
}

.todo-list-item li p {
    margin-bottom: 0
}

.todo-list-item li:before {
    position: absolute;
    top: -1px;
    left: -1px;
    display: inline-block;
    height: 103%;
    content: ""
}

.todo-list-item .todo-done {
    background: #f9f9f9
}

.todo-list-item .todo-done .todo-title {
    text-decoration: line-through;
    color: #b1b5b7
}

.todo-list-item .chk-todo {
    position: relative;
    top: -2px;
    margin-right: 10px
}

.btn-todo-list {
    position: relative;
    width: 25px;
    height: 25px;
    text-align: center;
    color: #fff;
    border-radius: 50%;
    background: #bfbfbf;
    font-size: 12px;
    line-height: 24px
}

.btn-todo-list i {
    position: relative;
    left: -1px
}

.btn-todo-list:hover,
.datepicker table tbody tr>td.day.today,
.datetimepicker table tbody tr>td.day.today {
    color: #fff;
    background: #328dff
}

.sorting-placeholder {
    visibility: visible!important;
    min-height: 50px;
    border: 1px dashed #ddd!important
}

.activity-timeline {
    margin-left: 100px;
    padding-left: 40px;
    border-left: 2px solid #e5e8eb
}

.activity-timeline .act-time {
    position: absolute;
    top: 5px;
    left: -140px;
    text-transform: uppercase;
    font-size: 10px;
    font-weight: 700
}

.activity-timeline li:before {
    content: ""
}

.activity-timeline li .timeline-icon {
    position: absolute;
    top: 0;
    left: -3.5rem;
    width: 30px;
    height: 30px;
    text-align: center;
    color: #fff;
    border-radius: 50%;
    background: #c6c5c7;
    font-size: 12px;
    font-weight: 700;
    line-height: 30px
}

.activity-timeline li .timeline-icon img {
    position: relative;
    top: -1px;
    width: 100%;
    height: auto;
    border-radius: 50%
}

.weather-radius {
    border-radius: 5px 0 0 5px
}

.accordion>dt>a,
.bg-transparent,
.toggle>dt>a {
    background: 0 0
}

.weather-shade img {
    position: absolute;
    top: 0;
    right: 0;
    width: 200px;
    height: auto
}

.chat-wrap {
    overflow-y: scroll;
    height: 340px
}

.chat-wrap li {
    display: inline-block;
    width: 100%;
    margin-bottom: 25px
}

.chat-wrap .chat-info {
    display: inline-block;
    width: 80%;
    padding: 1rem;
    border-radius: 4px;
    background: #f4f6f9
}

.chat-wrap .sender .chat-info {
    float: right;
    width: 70%;
    background: #82c3f3
}

.chat-wrap .sender .chat-info .chat-text {
    top: 0;
    color: #fff
}

.chat-wrap .chat-avatar {
    float: left;
    width: 28px
}

.chat-wrap .chat-avatar img {
    width: 28px;
    height: 28px;
    border-radius: 50%
}

.chat-wrap .chat-text {
    position: relative;
    top: 3px;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    font-size: 12px
}

.chat-type .file-attachment {
    position: relative;
    top: 5px;
    padding-right: 10px;
    color: #c6c5c7
}

.chat-type .form-control {
    width: 90%
}

.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {
    background: rgba(0, 0, 0, .1)
}

.mCSB_scrollTools .mCSB_draggerRail {
    background-color: transparent
}

.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.mCustomScrollBox>.mCSB_scrollTools {
    width: 3px
}

.mCSB_container {
    margin-right: 0
}

.vl-dropdown {
    min-width: 12rem;
    padding: .8rem;
    border: none;
    box-shadow: 0 0 30px 1px rgba(0, 0, 0, .1)
}

.vl-dropdown .dropdown-item {
    padding: .8rem .9rem;
    border-radius: 4px;
    font-family: "Montserrat", sans-serif;
    font-size: 12px
}

.vl-dropdown .dropdown-item:focus,
.vl-dropdown .dropdown-item:hover {
    color: #fff;
    background: #7a86ff
}

.accordion>dt,
.toggle>dt {
    margin-bottom: 10px;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: 400
}

.accordion>dt>a,
.toggle>dt>a {
    position: relative;
    display: block;
    padding: 14px 20px;
    text-decoration: none;
    color: #141414;
    border: 1px solid #e5e8eb;
    border-radius: 4px;
    background: #fff
}

.accordion>dt>a:hover,
.toggle>dt>a:hover {
    text-decoration: none
}

.accordion>dt>a.active,
.accordion>dt>a:hover,
.toggle>dt>a.active,
.toggle>dt>a:hover {
    cursor: pointer;
    color: #fff;
    border-color: #7a86ff;
    background: #7a86ff
}

.accordion>dt>a:after,
.toggle>dt>a:after {
    position: absolute;
    top: 50%;
    right: 20px;
    width: 15px;
    height: 15px;
    margin-top: -8px;
    content: "\e61a";
    text-align: center;
    text-transform: none;
    color: #949494;
    font-family: "themify";
    font-size: 12px;
    font-weight: 400;
    font-style: normal;
    font-variant: normal;
    line-height: 15px;
    -webkit-font-smoothing: antialiased;
    speak: none
}

.accordion>dt>a.active:after,
.accordion>dt>a.active:hover:after,
.toggle>dt>a.active:after,
.toggle>dt>a.active:hover:after {
    content: "\e622";
    color: #fff
}

.accordion>dt>a:hover:after,
.toggle>dt>a:hover:after {
    color: #fff
}

.accordion>dd,
.toggle>dd {
    margin-bottom: 10px;
    padding: 10px 20px 20px;
    color: #000;
    font-size: 14px;
    line-height: 1.8
}

.accordion>dt>a,
.accordion>dt>a:after,
.toggle>dt>a,
.toggle>dt>a:after {
    -webkit-transition: all .27s cubic-bezier(0, 0, .58, 1);
    transition: all .27s cubic-bezier(0, 0, .58, 1)
}

.icon-list-style {
    margin-bottom: 30px
}

.icon-list-style .preview {
    padding: 15px
}

.icon-list-style .preview i {
    padding-right: 15px;
    color: #737373;
    font-size: 18px
}

.error-position {
    margin-top: 8%
}

.invoice-table td,
.invoice-table th,
.table-custom td,
.table-custom th {
    vertical-align: middle
}

.table-custom {
    color: #6a7f9a
}

.table-custom .table-thumb {
    display: inline-block;
    width: 40px;
    height: 40px
}

.toastrStyle {
    margin: 30px 0;
    padding: 15px;
    border: 1px solid #e5e8eb
}

.btn {
    padding: .8rem 1.5rem;
    cursor: pointer;
    text-transform: uppercase;
    font-family: "Montserrat", sans-serif;
    font-size: 11px;
    font-weight: 400
}

.btn-group-lg>.btn,
.btn-lg {
    padding: 1rem 1.5rem;
    font-size: 14px;
    line-height: 1.5
}

.btn-group-sm>.btn,
.btn-sm {
    padding: .5rem 1rem;
    font-size: 10px;
    line-height: 1.5
}

.btn-pill {
    border-radius: 100px
}

.btn-primary {
    border: none;
    background: #328dff!important
}

.btn-primary:hover {
    background: #197fff!important
}

.btn-secondary {
    border: none;
    background: #737373!important
}

.btn-secondary:hover {
    background: #666!important
}

.btn-success {
    border: none;
    background: #3dba6f!important
}

.btn-success:hover {
    background: #37a764!important
}

.btn-danger {
    border: none;
    background: #fe413b!important
}

.btn-danger:hover {
    background: #fe2822!important
}

.btn-warning {
    border: none;
    background: #fab63f!important
}

.btn-warning:hover {
    background: #f9ad26!important
}

.btn-info {
    border: none;
    background: #18b9d4!important
}

.btn-info:hover {
    background: #15a5bd!important
}

.btn-dark {
    border: none;
    background: #2f3c4b!important
}

.btn-dark:hover {
    background: #252f3b!important
}

.btn-purple {
    color: #fff;
    border: none;
    background: #7a86ff!important
}

.btn-purple:hover {
    color: #fff;
    background: #616fff!important
}

.btn-outline-secondary {
    color: #2f3c4b;
    border-color: #e5e8eb;
    background-color: transparent
}

.btn-outline-secondary:hover {
    border-color: #2f3c4b;
    background: #2f3c4b
}

.btn-outline-primary {
    color: #328dff;
    border-color: #328dff
}

.btn-outline-primary:hover {
    border-color: #328dff;
    background: #328dff
}

.btn-outline-success {
    color: #3dba6f;
    border-color: #3dba6f
}

.btn-outline-success:hover {
    border-color: #3dba6f;
    background: #3dba6f
}

.btn-outline-danger {
    color: #fe413b;
    border-color: #fe413b
}

.btn-outline-danger:hover {
    border-color: #fe413b;
    background: #fe413b
}

.btn-outline-warning {
    color: #fab63f;
    border-color: #fab63f
}

.btn-outline-warning:hover {
    border-color: #fab63f;
    background: #fab63f
}

.btn-outline-info {
    color: #18b9d4;
    border-color: #18b9d4
}

.btn-outline-info:hover {
    border-color: #18b9d4;
    background: #18b9d4
}

.btn-example .btn {
    margin: 5px
}

.shape-form {
    display: inline-block;
    width: 38px;
    height: 25px;
    border: 1px solid #e5e8eb
}

.nav-form-custom .nav-link {
    padding: .1rem .5rem
}

.nav-form-custom .nav-link:first-child {
    padding-left: 0
}

.nav-form-custom .nav-link.active .shape-form {
    position: relative;
    border-color: #7a86ff;
    background: #7a86ff!important
}

.nav-form-custom .nav-link.active .shape-form:before {
    position: absolute;
    top: -1px;
    left: 33%;
    content: "\f05d";
    color: #fff;
    font-family: fontawesome
}

.pills-shape {
    border-radius: 50px
}

.shadow-shape {
    box-shadow: 0 1px 10px 1px rgba(0, 0, 0, .05)
}

.form-control {
    border-color: #e5e8eb
}

.form-control:focus {
    border-color: #7a86ff;
    box-shadow: none
}

.form-check-input {
    margin-top: .5rem
}

.form-fill {
    border-color: #f4f6f9;
    background: #f4f6f9
}

.form-pill {
    border-radius: 3.5rem
}

.form-shadow {
    box-shadow: 0 1px 10px 1px rgba(0, 0, 0, .05)
}

select.form-fill:not([multiple]),
select:not([multiple]) {
    background: url("data:image/svg+xml;utf8,<svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='18' height='18' viewBox='0 0 24 24'><path fill='grey' d='M7.406 7.828l4.594 4.594 4.594-4.594 1.406 1.406-6 6-6-6z'></path></svg>") #fff;
    background-repeat: no-repeat;
    background-position: 98% 50%;
    -webkit-appearance: none;
    -moz-appearance: none
}

select.form-fill:not([multiple]) {
    background-color: #f4f6f9
}

.note-editor.note-frame {
    border: 1px solid #e5e8eb
}

.note-editor.note-frame.card {
    border-radius: 0
}

.note-editor.note-frame.card .btn-light {
    color: #141414;
    border-color: #e5e8eb;
    background-color: #fff
}

.note-editor.note-frame.card .card-header {
    background: #f7f7f4
}

.input-group-addon-bg-none {
    background: 0 0
}

.custom-file-label,
.custom-file-label::after,
.custom-select,
.input-group-addon,
.input-group-text {
    border-color: #e5e8eb
}

.custom-file-label::after,
.input-group-text {
    background: #f4f6f9
}

.valid-feedback,
.valid-tooltip {
    font-family: "Open Sans", sans-serif!important
}

.bootstrap-timepicker.dropdown-menu,
.datepicker-inline,
.datepicker.dropdown-menu,
.datetimepicker.dropdown-menu {
    border: none!important;
    box-shadow: 0 0 30px 1px rgba(0, 0, 0, .1)
}

.form-control-lg,
.input-group-lg>.form-control,
.input-group-lg>.input-group-addon,
.input-group-lg>.input-group-btn>.btn {
    padding: .9rem 1rem
}

select.form-control-lg {
    padding: 0 1rem
}

.form-control-sm,
.input-group-sm>.form-control,
.input-group-sm>.input-group-addon,
.input-group-sm>.input-group-btn>.btn {
    padding: .15rem .5rem
}

@media (min-width:992px) {
    .picker-form .form-group label,
    .right-text-label-form .form-group label {
        text-align: right
    }
}

.bootstrap-timepicker.dropdown-menu:after,
.bootstrap-timepicker.dropdown-menu:before,
.datepicker-dropdown.datepicker-orient-top:after,
.datepicker-dropdown.datepicker-orient-top:before,
.datepicker-dropdown:after,
.datepicker-dropdown:before,
.step legend,
[class*=" datetimepicker-dropdown"]:after,
[class*=" datetimepicker-dropdown"]:before {
    border: none
}

.datepicker-dropdown:before {
    border-bottom-color: #fff
}

.datepicker-inline {}

.select2-container--default .select2-selection--multiple,
.select2-container--default .select2-selection--single,
.wizard>.content>.body input {
    border: 1px solid #e5e8eb
}

.datepicker,
.datetimepicker {
    z-index: 12000;
    width: 260px;
    padding: 10px
}

.datepicker table,
.datetimepicker table,
.dt-cont {
    width: 100%
}

.dt-cont {
    position: relative;
    height: 400px;
    margin: 0;
    padding: 0;
    border: 1px solid #ccc
}

.datepicker table tr td.active.active,
.datepicker table tr td.active.disabled,
.datepicker table tr td.active.disabled.active,
.datepicker table tr td.active.disabled.disabled,
.datepicker table tr td.active.disabled:active,
.datepicker table tr td.active.disabled:hover,
.datepicker table tr td.active.disabled:hover.active,
.datepicker table tr td.active.disabled:hover.disabled,
.datepicker table tr td.active.disabled:hover:active,
.datepicker table tr td.active.disabled:hover:hover,
.datepicker table tr td.active.disabled:hover[disabled],
.datepicker table tr td.active.disabled[disabled],
.datepicker table tr td.active:active,
.datepicker table tr td.active:hover,
.datepicker table tr td.active:hover.active,
.datepicker table tr td.active:hover.disabled,
.datepicker table tr td.active:hover:active,
.datepicker table tr td.active:hover:hover,
.datepicker table tr td.active:hover[disabled],
.datepicker table tr td.active[disabled],
.datetimepicker table tr td span.active.active,
.datetimepicker table tr td span.active.disabled.active,
.datetimepicker table tr td span.active.disabled:active,
.datetimepicker table tr td span.active.disabled:hover.active,
.datetimepicker table tr td span.active.disabled:hover:active,
.datetimepicker table tr td span.active:active,
.datetimepicker table tr td span.active:hover.active,
.datetimepicker table tr td span.active:hover:active,
.datetimepicker table tr td.active.active,
.datetimepicker table tr td.active.disabled.active,
.datetimepicker table tr td.active.disabled:active,
.datetimepicker table tr td.active.disabled:hover.active,
.datetimepicker table tr td.active.disabled:hover:active,
.datetimepicker table tr td.active:active,
.datetimepicker table tr td.active:hover.active,
.datetimepicker table tr td.active:hover:active {
    background-color: #b756ff
}

.datepicker table tr td.active,
.datepicker table tr td.active.disabled,
.datepicker table tr td.active.disabled:hover,
.datepicker table tr td.active:hover,
.datetimepicker table tr td span.active.active,
.datetimepicker table tr td span.active.disabled.active,
.datetimepicker table tr td span.active.disabled:active,
.datetimepicker table tr td span.active.disabled:hover.active,
.datetimepicker table tr td span.active.disabled:hover:active,
.datetimepicker table tr td span.active:active,
.datetimepicker table tr td span.active:hover.active,
.datetimepicker table tr td span.active:hover:active,
.datetimepicker table tr td.active,
.datetimepicker table tr td.active.disabled,
.datetimepicker table tr td.active.disabled:hover,
.datetimepicker table tr td.active:hover {
    background-image: none;
    text-shadow: none
}

.datepicker .datepicker-switch:hover,
.datepicker .next:hover,
.datepicker .prev:hover,
.datepicker table tr td.day.focused,
.datepicker table tr td.day:hover,
.datepicker tfoot tr th:hover,
.datetimepicker table tr td span:hover,
.datetimepicker table tr td.day:hover,
.datetimepicker tfoot tr:first-child th:hover,
.datetimepicker thead tr:first-child th:hover {
    background: #f2f6f9
}

.bootstrap-timepicker table td a {
    color: #949494
}

.bootstrap-timepicker table td a:hover {
    border-color: #e5e8eb;
    border-radius: 4px;
    background-color: #f4f6f9
}

.bootstrap-timepicker table td input {
    width: 35px;
    border: 1px solid #e5e8eb
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #141414;
    position: relative;
    padding: .65rem 1rem;
    line-height: 1.25
}

.select2-container--default .select2-selection--multiple .select2-selection__rendered {
    padding: 0 .8rem
}

.select2-container--default .select2-selection--multiple,
.select2-container--default .select2-selection--single {
    min-height: 40px
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    top: 7px;
    right: 7px
}

.select2-container--default .select2-selection--single .select2-selection__clear {
    top: 1px;
    right: 15px
}

.select2-container--default .select2-selection--multiple .select2-selection__choice,
.select2-container--default.select2-container--disabled .select2-selection--single {
    border: 1px solid #e5e8eb;
    background-color: #f4f6f9
}

.select2-container--default .select2-search--dropdown .select2-search__field {
    padding-right: 10px;
    padding-left: 10px;
    border: 1px solid #e5e8eb;
    outline: none
}

.select2-container,
.select2-container--default .select2-selection--multiple,
.select2-container--default .select2-selection--single {
    outline: none
}

.select2-dropdown {
    border: none;
    box-shadow: 0 0 30px 1px rgba(0, 0, 0, .1)
}

.select2-container--default .select2-results__option--highlighted[aria-selected] {
    color: #fff;
    background-color: #7a86ff
}

.select2-container--default .select2-results__option[aria-selected=true] {
    color: #141414;
    background-color: #f2f6f9
}

.select2-container--default.select2-container--focus .select2-selection--multiple {
    border: 1px #7a86ff solid;
    outline: 0;
    border-color: #7a86ff
}

.select2-container--default.select2-container--focus .select2-selection--single,
.select2-container--default.select2-container--open .select2-selection--multiple,
.select2-container--default.select2-container--open .select2-selection--single {
    border-color: #7a86ff
}

.ms-container .ms-list {
    border: 1px solid #e5e8eb;
    box-shadow: none
}

.ms-selectable .search-input,
.ms-selection .search-input {
    margin-bottom: 20px
}

.ms-container .ms-list.ms-focus {
    border-color: #7a86ff;
    outline: 0;
    outline: thin dotted \9;
    box-shadow: none
}

.ms-container .ms-selectable li.ms-hover,
.ms-container .ms-selection li.ms-hover {
    background-color: #7a86ff
}

.dropzone {
    margin-right: auto;
    margin-left: auto;
    padding: 50px;
    border: 1px dashed #e5e8eb;
    border-radius: 4px;
    -webkit-border-image: none;
    -o-border-image: none;
    border-image: none;
    background: #fff
}

.dropzone-primary {
    border: 1px dashed #328dff
}

.dropzone-info {
    border: 1px dashed #18b9d4
}

.dropzone-success {
    border: 1px dashed #3dba6f
}

.dropzone-warning {
    border: 1px dashed #fab63f
}

.dropzone-danger {
    border: 1px dashed #fe413b
}

.stepy-tab {
    margin: 40px 0;
    text-align: center
}

.stepy-tab ul {
    display: inline-block;
    list-style: none
}

.button-back,
.stepy-tab ul li {
    float: left
}

.button-next,
.finish {
    float: right
}

.button-back,
.button-next,
.finish {
    cursor: pointer;
    text-decoration: none
}

.step {
    clear: left
}

.step label,
.stepy-titles li span {
    display: block
}

.stepy-titles li {
    float: left;
    margin: 10px 15px;
    cursor: pointer;
    color: #737373
}

.stepy-titles li div,
.stepy-titles li.current-step div {
    width: auto;
    height: 50px;
    border-radius: 50px;
    line-height: 50px
}

.stepy-titles li.current-step div {
    position: relative;
    cursor: auto;
    color: #fff;
    background: #328dff
}

.stepy-titles li.current-step div:after {
    position: absolute;
    bottom: -26px;
    left: 50%;
    margin-left: -17px;
    content: "\e911";
    -webkit-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    transform: rotate(180deg);
    color: #328dff;
    font-family: dashlab-icon;
    font-size: 35px
}

.stepy-titles li div {
    padding: 0 40px;
    font-size: 16px;
    font-weight: 300
}

.wizard>.content {
    min-height: 25em;
    margin: .5em;
    margin-top: 1rem;
    border: 1px solid #e5e8eb;
    background: #fff
}

.stepy-titles li div,
.wizard>.steps .disabled a,
.wizard>.steps .disabled a:active,
.wizard>.steps .disabled a:hover {
    color: #949494;
    background: #f4f6f9
}

.wizard>.steps .current a,
.wizard>.steps .current a:active,
.wizard>.steps .current a:hover {
    color: #fff;
    background: #7a86ff
}

.wizard>.content>.body input:focus {
    border: 1px solid #7a86ff
}

.wizard>.content>.body label.error {
    margin-left: 0;
    color: #fe413b
}

.wizard>.content>.body input.error {
    margin-right: 10px;
    color: #fe413b;
    border: 1px solid #fe413b;
    background: #ffd9e6
}

.wizard>.steps .done a,
.wizard>.steps .done a:active,
.wizard>.steps .done a:hover {
    color: #fff;
    background: #e0e3ff
}

.wizard>.steps .number {
    width: 80px;
    height: 50px;
    margin-right: 10px;
    text-align: center;
    border-radius: 5px 0 0 5px;
    background: rgba(0, 0, 0, .08);
    font-size: 13px;
    line-height: 50px;
    display: none
}

.wizard>.steps a,
.wizard>.steps a:active,
.wizard>.steps a:hover {
    padding: 0
}

.wizard>.actions a,
.wizard>.actions a:active,
.wizard>.actions a:hover {
    background: #7a86ff
}

.wizard>.actions .disabled a,
.wizard>.actions .disabled a:active,
.wizard>.actions .disabled a:hover {
    color: #141414;
    border: 1px solid #e5e8eb;
    background: #fff
}

.wizard>.content>.body ul {
    list-style: none!important
}

.wizard>.steps>ul>li {
    text-align: center
}

.wizard>.steps>ul>li a {
    padding: 1rem;
    text-transform: uppercase
}

.wizard>.steps>ul>li a i {
    margin-bottom: .5rem;
    font-size: 32px
}

.wizard>.steps .current a,
.wizard>.steps .current a:active,
.wizard>.steps .current a:hover,
.wizard>.steps .disabled a,
.wizard>.steps .disabled a:hover,
.wizard>.steps .done a,
.wizard>.steps .done a:active,
.wizard>.steps .done a:hover {
    padding: 1rem
}

.play-btn i,
.wizard>.steps .current a {
    position: relative
}

.wizard>.steps .current a:after {
    position: absolute;
    bottom: -33px;
    left: 50%;
    margin-left: -17px;
    content: "\e911";
    -webkit-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    transform: rotate(180deg);
    color: #7a86ff;
    font-family: dashlab-icon;
    font-size: 35px
}

@media (max-width:767px) {
    .wizard>.steps .number {
        width: 40px
    }
    .wizard>.steps>ul>li {
        width: 50%
    }
}

.login-bg {
    background: #2f3c4b
}

.login-bg .container {
    margin-top: 8%
}

.login-form {
    float: left;
    width: 35%;
    padding: 3rem;
    border-radius: 10px 0 0 10px;
    background: #fff
}

.login-form a.forgot-link {
    color: #2f3c4b
}

.login-form a.forgot-link:hover {
    text-decoration: underline
}

.login-form .form-control {
    font-size: .8rem;
    line-height: 2.2
}

.login-promo {
    float: left;
    width: 65%;
    min-height: 550px;
    border-radius: 10px
}

.registration-promo {
    min-height: 600px
}

.login-promo-content {
    position: absolute;
    top: 50%;
    width: 100%;
    padding: 5rem;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%)
}

.play-btn {
    display: inline-block;
    width: 55px;
    height: 55px;
    text-align: center;
    color: #7a86ff;
    border: 5px solid rgba(255, 255, 255, .5);
    border-radius: 50%!important;
    background: #fff;
    line-height: 45px
}

.play-btn i {
    left: 2px;
    color: #7a86ff;
    font-size: 16px
}

.form-divider {
    position: relative;
    clear: both;
    height: 0;
    margin: 2.5rem 0;
    border-top: 1px dashed #e5e8eb
}

.form-divider:before {
    position: absolute;
    top: -14px;
    left: 50%;
    margin-left: -10px;
    padding: 0 5px;
    content: "or";
    color: #949494;
    background: #fff
}

.btn-facebook {
    position: relative;
    display: block;
    color: #fff;
    background: #4d65cd;
    font-weight: 500
}

.btn-facebook i {
    position: absolute;
    top: 10px;
    left: 20px;
    padding-right: 20px;
    border-right: 1px solid rgba(255, 255, 255, .5);
    font-size: 20px
}

.btn-facebook:hover {
    color: #fff;
    background: #445ab6
}

@media (max-width:992px) {
    .login-form,
    .login-promo {
        display: block;
        width: 100%;
        margin-bottom: 1rem;
        border-radius: 10px
    }
    .login-form,
    .login-promo-content {
        padding: 1.5rem
    }
    .login-promo,
    .registration-promo {
        min-height: 400px
    }
}

.fc-state-default {
    box-shadow: none
}

.fc-time-grid, .fc-time-grid-container{
    height: 100% !important;
}

.fc-today{
    color: #7a86ff;
    font-weight: 700 !important;
}
.fc-unthemed th.fc-day-header {
    padding: .7rem .5rem;
    font-size: 1rem;
    font-weight: 500
}

.fc-unthemed .fc-day-grid td:not(.fc-axis) {
    padding: .5rem
}

a:not([href]):not([tabindex]) {
    text-decoration: none;
    color: inherit
}

.fc-unthemed .fc-toolbar .fc-button {
    border: 1px solid #e5e8eb;
    background: #f4f6f9;
    text-shadow: none!important;
    height: 2.5rem;
    padding: 0 1.25rem;
    outline: none!important;
    font-size: .9rem
}

.fc-unthemed .fc-toolbar .fc-button.fc-state-disabled {
    color: #737373;
    background: #f4f6f9
}

.fc-unthemed .fc-toolbar .fc-button.fc-state-active,
.fc-unthemed .fc-toolbar .fc-button:active,
.fc-unthemed .fc-toolbar .fc-button:focus {
    color: #fff;
    border: 0;
    background: #7a86ff;
    box-shadow: none;
    text-shadow: none
}

.fc-unthemed .fc-toolbar h2 {
    margin-top: .7rem;
    text-transform: uppercase;
    font-size: 1.1rem;
    font-weight: 500
}

.fc-icon-left-single-arrow:after,
.fc-icon-right-single-arrow:after {
    font-weight: 400
}

.fc-event,
.fc-event-dot {
    background-color: #1cc2aa
}

.fc-event {
    border: 1px solid #eef2f5;
}

.d-fc-event-primary {
    border: none;
    background: #7a86ff
}

.d-fc-event-danger .fc-title,
.d-fc-event-info .fc-title,
.d-fc-event-primary .fc-title,
.d-fc-event-success .fc-title {
    color: #fff
}

.d-fc-event-success {
    border: none;
    background: #3dba6f
}

.d-fc-event-danger {
    border: none;
    background: #fe413b
}

.d-fc-event-warning {
    border: none;
    background: #fab63f
}

.d-fc-event-info {
    border: none;
    background: #18b9d4
}

.fc-ltr .fc-h-event.fc-not-start {
    padding-left: 10px
}

.fc-day-grid-event {
    padding: 10px
}

.fc-popover .fc-header {
    padding: 6px
}

.fc-unthemed .fc-popover .fc-header .fc-close {
    margin-top: 6px;
    font-size: .9em
}

.fc-event-container a {
    margin-bottom: 3px
}

.fc-popover {
    box-shadow: none
}

.fc-title {
    font-weight: 500
}

@media (max-width:992px) {
    .fc-unthemed .fc-toolbar .fc-button {
        height: 2rem
    }
    .fc-unthemed th.fc-day-header {
        padding: .3rem .5rem
    }
    .fc-unthemed .fc-toolbar {
        margin-bottom: 1.5rem
    }
    .fc-unthemed .fc-toolbar .fc-center,
    .fc-unthemed .fc-toolbar .fc-left,
    .fc-unthemed .fc-toolbar .fc-right {
        display: block;
        float: none;
        margin-bottom: 1rem;
        text-align: center
    }
    .fc-unthemed .fc-toolbar .fc-center h2,
    .fc-unthemed .fc-toolbar .fc-left h2,
    .fc-unthemed .fc-toolbar .fc-right h2 {
        float: none;
        text-align: center
    }
    .fc-unthemed .fc-toolbar .fc-center>.fc-button-group,
    .fc-unthemed .fc-toolbar .fc-left>.fc-button-group,
    .fc-unthemed .fc-toolbar .fc-right>.fc-button-group {
        display: inline-block;
        float: none
    }
    .fc-unthemed .fc-toolbar .fc-center>.fc-button,
    .fc-unthemed .fc-toolbar .fc-center>.fc-button-group>.fc-button,
    .fc-unthemed .fc-toolbar .fc-left>.fc-button,
    .fc-unthemed .fc-toolbar .fc-left>.fc-button-group>.fc-button,
    .fc-unthemed .fc-toolbar .fc-right>.fc-button,
    .fc-unthemed .fc-toolbar .fc-right>.fc-button-group>.fc-button {
        float: none
    }
}

.d-fc-event-accent-bg,
.fc-unthemed .fc-list-item.d-fc-event-accent .fc-event-dot {
    border-color: #3dba6f;
    background: #3dba6f
}

.fc-unthemed .fc-list-item.d-fc-event-red .fc-event-dot {
    border-color: #fe413b;
    background: #fe413b
}

.fc-unthemed .fc-list-item.d-fc-event-yellow .fc-event-dot {
    border-color: #fab63f;
    background: #fab63f
}

.fc-unthemed .fc-list-item.d-fc-event-blue .fc-event-dot {
    border-color: #18b9d4;
    background: #18b9d4
}

.fc-unthemed .fc-list-item .fc-event-dot {
    border-color: #949494;
    background: #949494
}

.fc-unthemed .fc-divider,
.fc-unthemed .fc-list-heading td,
.fc-unthemed .fc-list-item:hover td,
.fc-unthemed .fc-popover .fc-header {
    background: #f4f6f9
}

.fc-unthemed .fc-content,
.fc-unthemed .fc-divider,
.fc-unthemed .fc-list-heading td,
.fc-unthemed .fc-list-view,
.fc-unthemed .fc-popover,
.fc-unthemed .fc-row,
.fc-unthemed tbody,
.fc-unthemed td,
.fc-unthemed th,
.fc-unthemed thead {
    border-color: #e5e8eb
}
.fc-content{
  color: #fff;
  font-weight: 700;
}
.fc-list-table td {
    padding: 15px
}

.calendar-event-list .fc-event {
    margin-bottom: 10px;
    padding: 10px;
    cursor: move;
    color: #2c2f33
}

#calendar-external-events .fc-day-grid-event {
    padding: 5px
}

.profile-banner {
    width: 100%;
    height: 300px;
    padding: 2rem;
    color: #fff;
    background: #2f3c4c;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover
}

.profile-banner,
.profile-nav {
    position: relative;
    top: -2.1rem
}

.profile-info-position {
    position: relative;
    top: -15rem
}

.profile-social-link a {
    color: #c6c5c7;
    font-size: 18px
}

.profile-social-link a:hover {
    color: #7a86ff
}

.profile-nav-links a {
    margin: 0 1.5rem;
    padding: 1.5rem 0;
    color: #2f3c4b;
    border-bottom: 2px solid transparent
}

.profile-nav-links .active,
.profile-nav-links a:hover {
    border-bottom: 2px solid #7a86ff
}

@media (max-width:992px) {
    .profile-info-position {
        top: 0
    }
    .profile-nav-links a {
        margin: 0 .5rem;
        padding: 1.2rem 0
    }
}

@media (min-width:992px) {
    .top-nav {
        background: #f4f6f9
    }
    .top-nav .search-wrap {
        position: relative
    }
    .top-nav .search-wrap i {
        position: absolute;
        top: 9px;
        left: 15px;
        color: rgba(255, 255, 255, .3)
    }
    .top-nav .search-input {
        padding-left: 40px;
        color: #fff;
        border: none;
        background: rgba(255, 255, 255, .08);
        font-size: 14px
    }
    .top-nav .navbar {
        box-shadow: none
    }
    .top-nav .navbar-dark {
        background: #30384c
    }
    .top-nav .navbar-dark .header-links .nav-link {
        color: #fff
    }
    .top-nav .content-wrapper {
        margin-left: 0;
        padding-bottom: 0
    }
    .top-nav .box-container {
        width: 1200px;
        margin: 0 auto
    }
    .top-nav .container-fluid {
        padding: 0
    }
    .top-nav .navbar-hide-responsive {
        display: block
    }
    .top-nav .navbar-brand-responsive {
        display: none
    }
    .top-nav .sticky-footer {
        position: relative
    }
    .top-nav .dropdown-toggle:after {
        position: relative;
        top: 1px;
        content: "\f107";
        vertical-align: initial;
        border: none;
        font-family: fontawesome
    }
    .top-nav .navbar-dark .navbar-nav .nav-item.active .nav-link {
        color: #7a86ff
    }
}

@media (max-width:992px) {
    .top-nav {
        padding-top: 46px!important
    }
    .top-nav .navbar {
        padding: .1rem 1rem
    }
    .top-nav .box-container {
        width: 100%
    }
    .top-nav .search-wrap {
        position: relative;
        margin-bottom: 20px
    }
    .top-nav .search-wrap i {
        position: absolute;
        top: 12px;
        left: 15px;
        color: #141414
    }
    .top-nav .search-input {
        height: 40px;
        padding-left: 40px;
        color: #141414;
        border: none;
        background: #f4f6f9;
        font-size: 14px
    }
    .top-nav .navbar-nav.header-links {
        margin-top: 10px
    }
    .top-nav .navbar-dark .navbar-nav .nav-link:focus {
        color: #7a86ff
    }
    .top-nav .navbar-dark .navbar-nav .nav-item.active .nav-link {
        color: #7a86ff
    }
    .top-nav .navbar-brand-responsive {
        position: relative;
        top: 5px;
        display: inline-block
    }
    .top-nav .navbar-hide-responsive {
        display: none
    }
    .top-nav .nav-notification-toggler {
        position: absolute;
        top: 10px;
        right: 5px
    }
    .top-nav .navigation-list-toggler {
        position: absolute;
        top: 5px;
        right: 50px
    }
    .top-nav .dropdown-toggle:after {
        position: absolute;
        top: 10px;
        right: 15px;
        content: "\f107";
        border: none;
        font-family: fontawesome
    }
    .top-nav .content-wrapper {
        min-height: calc(100vh - 45px)
    }
    .top-nav .container-fluid {
        padding-right: 15px;
        padding-left: 15px
    }
    .top-nav footer.sticky-footer {
        position: relative
    }
}

.container-fluid {
    padding-right: 30px;
    padding-left: 30px
}

.card,
.card-header {
    border-color: #e5e8eb
}

.card {
    border-radius: 5px
}

.card-footer,
.card-header {
    background: 0 0
}

.card-shadow {
    box-shadow: 0 1px 10px 1px rgba(0, 0, 0, .05)
}

.badge-primary,
.bg-primary {
    background: #328dff!important
}

.badge-secondary,
.bg-secondary {
    background: #737373!important
}

.badge-success,
.bg-success {
    background: #3dba6f!important
}

.badge-danger,
.bg-danger {
    background: #fe413b!important
}

.badge-warning,
.bg-warning {
    background: #fab63f!important
}

.badge-info,
.bg-info {
    background: #18b9d4!important
}

.badge-dark,
.bg-dark {
    background: #2f3c4b!important
}

.badge-purple,
.bg-purple {
    background: #7a86ff!important
}

.badge-purple-light,
.bg-purple-light {
    background: #b756ff!important
}

.badge-turguoise,
.bg-turquoise {
    background: #31c3b2!important
}

.badge-pink,
.bg-pink {
    background: #ec0080!important
}

.bg-gray {
    background: #e5e8eb!important
}

.text-primary,
a.text-primary {
    color: #328dff!important
}

.text-secondary,
a.text-secondary {
    color: #737373!important
}

.text-success,
a.text-success {
    color: #3dba6f!important
}

.text-danger,
a.text-danger {
    color: #fe413b!important
}

.text-warning,
a.text-warning {
    color: #fab63f!important
}

.text-info,
a.text-info {
    color: #18b9d4!important
}

.text-dark,
a.text-dark {
    color: #2f3c4b!important
}

.text-purple,
a.text-purple {
    color: #7a86ff!important
}


.text-purple-light,
a.text-purple-light {
    color: #b756ff!important
}

a.text-primary:hover {
    color: #0071fe!important
}

a.text-secondary:hover {
    color: #5a5a5a!important
}

a.text-success:hover {
    color: #309458!important
}

a.text-danger:hover {
    color: #fe1008!important
}

a.text-warning:hover {
    color: #f9a30d!important
}

a.text-info:hover {
    color: #1391a6!important
}

a.text-dark:hover {
    color: #1b232c!important
}

a.text-purple:hover {
    color: #4758ff!important
}

a.text-purple-light:hover {
    color: #a123ff!important
}

.border {
    border-color: #e5e8eb!important
}

.border-top {
    border-top-color: #e5e8eb!important
}

.border-right {
    border-right-color: #e5e8eb!important
}

.border-bottom {
    border-bottom-color: #e5e8eb!important
}

.border-left {
    border-left-color: #e5e8eb!important
}

.breadcrumb {
    margin-bottom: 0;
    background: 0 0
}

.breadcrumb .breadcrumb-item {
    font-size: 13px
}

.breadcrumb a {
    color: #949494
}

.breadcrumb a:hover {
    color: #7a86ff
}

.breadcrumb-item.active {
    color: #737373
}

.breadcrumb-item+.breadcrumb-item::before {
    display: inline-block;
    padding-right: .5rem;
    padding-left: .5rem;
    content: "\f105";
    color: #c6c5c7;
    font-family: "FontAwesome"
}

.custom-control-label::after,
.custom-control-label::before {
    top: .35rem
}

.bd-example-row .row>.col,
.bd-example-row .row>[class^=col-] {
    padding-top: .75rem;
    padding-bottom: .75rem;
    border: 1px solid rgba(86, 61, 124, .2);
    background-color: rgba(86, 61, 124, .15)
}

.nav-pills .nav-link,
.nav-tabs .nav-link {
    color: #141414
}

.nav-link.disabled {
    color: #949494
}

.table-bordered thead td,
.table-bordered thead th {
    border-bottom-width: 0
}

.table thead th {
    vertical-align: bottom;
    border-bottom: 0 solid #e5e8eb
}

.table-bordered {
    border: 1px solid #e5e8eb;
    border-top: none;
    border-bottom: none
}

.table-active,
.table-active>td,
.table-active>th,
.table-hover tbody tr:hover,
.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, .02)
}

.page-link:hover,
.table .thead-light th {
    border-color: #e5e8eb;
    background-color: #f4f6f9
}

.page-item.active .page-link {
    z-index: 1;
    color: #fff;
    border-color: #7a86ff;
    background-color: #7a86ff
}

.page-link {
    color: #141414;
    border: 1px solid #e5e8eb
}

.page-link:hover {
    text-decoration: none;
    color: #7a86ff;
    background-color: #e5e8eb
}

.dropdown-item.active,
.dropdown-item:active {
    text-decoration: none;
    color: #7a86ff!important;
    background-color: #f8f9fa
}
</style>

<script>
  window.console = window.console || function(t) {};
</script>

  
  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }

	  function gonder(){
		  document.frm2.action="kontrol.php?veri=11";
		  document.frm2.submit();
	  }
	  function sil(){
		  var kontrol=confirm("Kaydı silmek istediğinizden emin misiniz?");
		  if(kontrol==1){
		  	document.frm2.action="kontrol.php?veri=12";
		  	document.frm2.submit();
		  }
	  }
	  
</script>


</head>

<body translate="no">
	    <form name="frm1" action="program.php?snc=1" method="post">
<?php				
		
		$ogrbul=mysqli_query($baglan, "select * from siniflar_tbl where id=$gelen");	
		if($oku=mysqli_fetch_assoc($ogrbul)){
			$sinif=$oku["sinif"];
		}else{
			$sinif="";
		}     
		
			
		if($gelen!=0){
			echo "<font color='olive' size='4'>$sinif SINIFI DERS PROGRAMI</font>";
		}
			echo "<center><select id='prsinif' name='prsinif' onchange='submit()' style='width:300px;height:35px;border-radius:15px;padding-left:10px;'>
					<option value=''>SINIF SEÇİNİZ</option>";
			$listele=mysqli_query($baglan, "select * from siniflar_tbl order by sinif");
			while($oku=mysqli_fetch_assoc($listele)){
				if($gelen==$oku["id"]){
					echo "<option value='".$oku["id"]."' selected>".$oku["sinif"]."</option>";
				}else{
					echo "<option value='".$oku["id"]."'>".$oku["sinif"]."</option>";	
				}
				
			}
			echo "</select>";		
?>	
	</form>
	
	<div id="calendar-external-events" data-min-time="07:50" data-max-time="23:59" data-slot-duration="00:10"></div>

<div class="modal fade" id="calendar-event-modal" tabindex="-1" role="dialog" aria-labelledby="calendar-event-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
				<div class="modal-content">
						<div class="modal-header">
								<h5 class="modal-title" id="calendar-event-modal-label">Yeni Ders</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">								
									<form name="frm2" action="kontrol.php?veri=10" method="post">
										<div class="form-group">
												<label for="event-ders" class="col-form-label">Ders:</label>
												<input type="text" name="ders" class="form-control" id="event-ders" list="dersler" placeholder="Ders Seçiniz..." onClick="this.value=''">
												<datalist id="dersler">
													<?php                                                            
															$listele3=mysqli_query($baglan, "select * from dersler_tbl order by ders");
															while($oku3=mysqli_fetch_assoc($listele3)){
																echo "<option value='".$oku3["ders"]."'>";
															}
													?>
												</datalist>											
												<input type="hidden" name="sinifadi" value="<?=$gelen;?>">
												<input type="hidden" name="progid" id="progid">
												<input type="hidden" name="butonlar" id="butonlar" value="<?=$btndeg;?>">
										</div>
							
										<div class="form-group">
												<label for="event-ogret" class="col-form-label">Öğretmen:</label>
                                            
												<input type="text" name="ogretmen" class="form-control" id="event-ogret" list="ogretmenler" placeholder="Öğretmen Seçiniz..." onClick="this.value=''">
												<datalist id="ogretmenler">
													<?php                                                            
															$listele3=mysqli_query($baglan, "select * from ogretmenler_tbl order by adi");
															while($oku3=mysqli_fetch_assoc($listele3)){
																echo "<option value='".$oku3["adi"]."'>";
															}
													?>
												</datalist>	
                                            
										</div>	
							
										<div class="form-group">
												<label for="event-konum" class="col-form-label">Ders İşlenecek Alan/Konum/Yer:</label>
                                            
												<input type="text" name="konum" class="form-control" id="event-konum" list="konumlar" placeholder="Ders İşlenecek Alanı Seçiniz..." onClick="this.value=''">
												<datalist id="konumlar">
													<?php                                                            
															$listele3=mysqli_query($baglan, "select * from konumlar_tbl order by konum");
															while($oku3=mysqli_fetch_assoc($listele3)){
																echo "<option value='".$oku3["konum"]."'>";
															}
													?>
												</datalist>
                                            
										</div>							
							
										<div class="form-group">
												<label for="time-start" class="col-form-label">Başlangıç Saati:</label>
												<input name="baslama" type="text" class="form-control" id="time-start">
										</div>
										<div class="form-group">
												<label for="time-end" class="col-form-label">Bitiş Saati:</label>
												<input name="bitis" type="text" class="form-control" id="time-end">
										</div>
								
						</div>
						<div class="modal-footer">
								<!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>-->
								<button type="button" class="btn btn-primary" onClick="gonder()" id="gnc">Güncelle</button>
	
								<button type="button" class="btn" style="background-color: #32c861;color:white;" onClick="submit()" id="kyd">Kaydet</button>
								<button type="button" class="btn" style="background-color: #f96a74;color:white;" onClick="sil()">Sil</button>
							
						</div>
				</div>
		</div>
</div>	
	
<script src='assets/jquery.min.js'></script>
<script src='assets/bootstrap.min.js'></script>
<script src='assets/moment.min.js'></script>
	
<?php
		if(isset($_REQUEST["prsinif"])){
			echo "<script src='assets/fullcalendar.min.js'></script>";
		}
?>		
	
<script src='assets/tr.js'></script>
    
<?php
		if($sonuc==2){
 			$basla=$_REQUEST["baslama"];
			$bitir=$_REQUEST["bitis"];
            echo "<script>{document.getElementById('time-start').value='$basla'}</script>";
            echo "<script>{document.getElementById('time-end').value='$bitir'}</script>"; 
			
?>			
			<script>{
					$('#calendar-event-modal').modal('show');
				}
			</script>
		<?php
			  if($_POST["butonlar"]=="kayit"){		  
		?>    
				<script>
					{
						$('#calendar-event-modal').modal('show');
						document.getElementById("gnc").style.display="none";
						document.getElementById("kyd").style.display="inherit";
					}
				</script>
		<?php
			  }else{
		?>    
				<script>
					{
						$('#calendar-event-modal').modal('show');
						document.getElementById("gnc").style.display="inherit";
						document.getElementById("kyd").style.display="none";
					}
				</script>
		<?php
			  }
			
			
	}
?>	
      <script id="rendered-js" >
$(function () {
  "use strict";
  if ($('#calendar-external-events').length > 0) {
    var $calender = $('#calendar-external-events'),
    $modal = $('#calendar-event-modal');

    $calender.fullCalendar({
      locale: 'tr',
      header: {
        left: 'prev, next today',
        center: 'title',
        right: 'month, agendaWeek, agendaDay, listDay' },

      defaultDate: moment().format('YYYY-MM-DD'),
      defaultView: 'agendaWeek',
      allDaySlot: false,
      allDay: false,
      axisFormat: 'HH:mm',
      minTime: $calender.data('min-time'),
      maxTime: $calender.data('max-time'),
      slotDuration: $calender.data('slot-duration'),
      slotLabelFormat: 'HH:mm',
      nowIndicator: true,
      now: moment(),
      selectable: true,
      selectHelper: true,
      editable: true,
      eventLimit: true,
      dragScroll: true,
      /*
      hiddenDays: [0],
      businessHours: {
          dow: [1,2,3,4,5],
          start: '09:00',
          end: '19:00',
      },
      */
      views: {
        day: {
          titleFormat: 'DD MMMM YYYY',
          columnFormat: 'DD.MM.YYYY dddd' },

        week: {
          titleFormat: 'D MMMM YYYY',
          titleRangeSeparator: ' - ',
          columnFormat: 'DD.MM.YYYY ddd' },

        month: {
          titleFormat: 'MMMM YYYY',
          columnFormat: 'dddd' } },


      events: [
		  
 <?php
    $sayac=0;	
	$renk=array("#00bbfc","#bd463f","#fe413b","#7a86ff","#03c03c","#cd5700","#00008b","#584bb1","#a6569e","#784d2e","#4fad6c","#2f83cd","#bc9e40","#a6569e","#468bbc","#d2691e","#7e7e7e","#ff0000","#00aaff","#ff0066","#0083ff","#4159e1","#cc3333","#ca35b1","#1CE882");		
		
    $listele8=mysqli_query($baglan, "select * from program_tbl where sinif=$gelen"); 
    while($oku2=mysqli_fetch_assoc($listele8)){
        switch($oku2["gun"]){
            case 7:
                $tarih=$paz;
                break;
            case 1:
                $tarih=$pts;
                break;
            case 2:
                $tarih=$sal;
                break;
            case 3:
                $tarih=$car;
                break;
            case 4:
                $tarih=$per;
                break;
            case 5:
                $tarih=$cum;
                break;
            case 6:
                $tarih=$cts;
                break;
        }
		$drenk=$renk[$sayac];
		$sayac++;
		if($sayac==25){
			$sayac=0;
		}  
		
		$bitis=date("H:i:s", strtotime($oku2["bitis"]));
		$basla=date("H:i:s", strtotime($oku2["baslama"]));
		
        echo "
		      {
        title: '".$oku2["ders"]." ".$oku2["ogretmen"]." ".$oku2["konum"]."',
		ders: '".$oku2["ders"]."',
        sinif: '".$oku2["sinif"]."',
        ogr: '".$oku2["ogretmen"]."',
        kon: '".$oku2["konum"]."',
		sinifid: '$gelen',
        start: moment().format('$tarih $basla'),
        end: moment().format('$tarih $bitis'),
        color: '$drenk',
		id:".$oku2["id"]."
		},";		
	}
/*		


		$dersler=array();
		$sayac=0;
    	$listele5=mysqli_query($baglan, "select ders from kurumacphareket_tbl where paket_id=$paket group by ders"); 
        while($oku5=mysqli_fetch_assoc($listele5)){
			$dersler[]=$oku5["ders"];
			$dersrenk[$sayac]=$renk[$sayac];
			$sayac++;
		}
		
		
    $listele8=mysqli_query($baglan, "select * from kurumacphareket_tbl where paket_id=$paket"); 
    while($oku2=mysqli_fetch_assoc($listele8)){
        switch($oku2["gunadi"]){
            case "Pazar":
                $tarih=$paz;
                break;
            case "Pazartesi":
                $tarih=$pts;
                break;
            case "Salı":
                $tarih=$sal;
                break;
            case "Çarşamba":
                $tarih=$car;
                break;
            case "Perşembe":
                $tarih=$per;
                break;
            case "Cuma":
                $tarih=$cum;
                break;
            case "Cumartesi":
                $tarih=$cts;
                break;
        }

 			$listele15=mysqli_query($baglan, "select * from siniflar_tbl where adi='".$oku2["sinif"]."' and kurum_id=".$_SESSION["kurumid"]);
			if($oku15=mysqli_fetch_assoc($listele15)){
				$sinifidsi=$oku15["id"];
			}else{
				$sinifidsi=0;
			}		
				
      
        
        

		
		//{title:'',start: moment().format(' ".$oku2["saat"]."'),end: moment().format('$tarih $bitis') ,color: '''},";
        $sayac++;
    }
	*/	
?>
   
	  ],


      select: function (start, end) {		  
        var select_start = moment(start).format('YYYY-MM-DD HH:mm:00');
        var select_end = moment(end).format('YYYY-MM-DD HH:mm:00');		  

         $('.modal-title').html('Yeni Ders');        	
        $('#event-ders').val('');
        $('#event-ogret').val('');
        $('#event-konum').val('');		  
        $('#time-start').val(select_start);
        $('#time-end').val(select_end);
		document.getElementById("butonlar").value="kayit";
		document.getElementById("gnc").style.display="none";
		document.getElementById("kyd").style.display="inherit"; 
        $modal.modal('show');
      },
      eventClick: function (event, view) {			  
        var event_start = moment(event.start).format('YYYY-MM-DD HH:mm:00');
        var event_end = moment(event.end).format('YYYY-MM-DD HH:mm:00');

        $('.modal-title').html("Güncelleme");
        $('#event-ders').val(event.ders);
        $('#event-ogret').val(event.ogr);
        $('#event-konum').val(event.kon);
        $('#progid').val(event.id);

        $('#time-start').val(event_start);
        $('#time-end').val(event_end);
        $('#paketid').val(event.id);
		document.getElementById("butonlar").value="guncelle";
		document.getElementById("gnc").style.display="inherit";
		document.getElementById("kyd").style.display="none";		  
		
        $modal.modal('show');	
		  
      },
      windowResize: function (view) {
        screen_resize();
      },
      dayRender: function (date, cell) {
        var today = $calender.moment();
        var end = $calender.moment().add(7, 'days');
        if (date.get('date') == today.get('date')) {
          cell.css("background", "#f03");
        }
      } });

    screen_resize();

    function screen_resize() {
      if ($(window).width() < 768) {
        $calender.fullCalendar('changeView', 'listDay');
      } else if ($(window).width() < 992) {
        $calender.fullCalendar('changeView', 'agendaDay');
      } else {
        $calender.fullCalendar('changeView', 'agendaWeek');
      }
    }

    $modal.on('hidden.bs.modal', function (e) {
      $('#send-messege').text('Send message');
    });

  }
});
//# sourceURL=pen.js
    </script></body>
</html>
<?php
		mysqli_close($baglan);
	}
	else{
		header('Location: hata.php');
	}
}
else{
	header('Location: hata.php');
}
?>