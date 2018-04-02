<style>
/*-< GENERAL*/
/* fondo pasto*/
body
{
background: #010D27 url('<?= base_url()?>assets_fe/img/bg.jpg') top center repeat-y;
}

/* barra principal*/
.main-menu 
{
background: #c80b42;
border-top: 1px solid #980b22;
border-bottom: 1px solid #980b22;
}

/*flecha desplegable barra principal*/
.main-menu .caret, .main-menu  > a:hover .caret, .main-menu  > a:focus .caret {
border-top-color: #fff;
border-bottom-color: #fff;
}

/* item barra principal*/
.main-navbar > li > a 
{
color: #fff;
}

/* item barra principal activo*/
.main-navbar > li > a:hover, .main-menu a:hover, .main-navbar > li > .active, .main-navbar .open > a, .main-navbar .open > a:hover, .main-navbar .open > a:focus {
color: #fff;
background: #8f082f;
}

/* links derecha. El hover/active es igual a "barra 1 activa".*/
.main-navbar .min-link > a {
font-size: 12px;
color: #380b12;
}

/* barra título sección*/
#section-header {
background: #1B69B3;
color: #ffffff;
}

/* barra menú sección*/
#section-nav {
background: #4F8AC2;
}
/* color texto barra menú sección*/
#section-nav p {
color: #fff;
}

/* item menú sección*/
#section-nav li a {
color: #316597;
text-shadow: none;
}
/* item menú sección activo*/
#section-nav .active {
color: #fff;
}

/* menu desplegable sección item destacado*/
#section-nav li .sum-league {
color: #5195c7;
font-weight: bold;
}

/* flecha menú desplegable menú sección*/
#section-nav a .caret, #section-nav a:hover .caret, #section-nav a:focus .caret {
border-top-color: #2a6496;
border-bottom-color: #2a6496;
}

/* menu desplegable sección item destacado hover*/
#section-nav li .sum-league:hover
{
	color: #fff;
	background: #5F9Ad2;
	font-weight: bold;
}


/* links generales*/
a {
color: #428bca;
text-decoration: none;
}

/* botón principal*/
.btn-primary {
color: #ffffff;
background-color: #428bca;
border-color: #357ebd;
}

/* botón principal activo/hover*/
.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open .dropdown-toggle.btn-primary {
color: #ffffff;
background-color: #3276b1;
border-color: #285e8e;
}

/*-< PRONOSTICOS*/
/*---< precla y ganadores*/

/* titulo explicativo*/
.page-title {
background: #1F446A;
color: #fff;
}
/* podio ganadores*/
.winners-podium {
color: #1B69B2;
background: #fff;
}

/*---< primera ronda*/

/* barra fecha de partido*/
.zone-table th, .zone-table th:hover 
{
background: #214569;
color: #FFF;
}

/* info grupo*/
.zone-table .zone-info {
color: #214569;
}

/* tabla stats tab*/
.matches-stats-tabs .nav-tabs > li > a {
background: #053460;
}

/* tabla stats tab activo*/
.matches-stats-tabs .nav-tabs > li.active > a {
background: #1A68B2;
color: #fff;
}

/*-< SCORES*/
/* Posición (nro) de cada jugador*/
.scores-position {
color: #1B69B3;
font-weight: bold;
}


/*-< WALL*/

/* nombre de la persona del post*/
.comment-box .comment-body h3 {
color: #1B69B3;
}

/* nombre de la persona que comenta*/
.post-comment .comment-name {
color: #4F8AC2;
font-weight: bold;
}

/* MI PERFIL*/

/* color puntaje liga*/
#profile-info #general-league-score 
{
color: #fff;
}
</style>