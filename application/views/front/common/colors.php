<style>
/*-< GENERAL*/

/*--< LOGIN*/

/*panel primario*/
.panel-primary
{
	border: 1px solid; 
	border-color: #111;
}

/* header caja login*/
.panel-primary > .panel-heading 
{
	background: #333; 
	border: 1px solid; 
	border-color: #333;
	background-image:none;
}

/* barra principal*/
.main-menu 
{
background: #f59245;
border-top: 1px solid #b56527;
border-bottom: 1px solid #b56527;
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
background: #b56527;
}

/* links derecha. El hover/active es igual a "barra 1 activa".*/
.main-navbar .min-link > a {
font-size: 12px;
color: #380b12;
}

/* barra título sección*/
#section-header {
background: #2e2e2e;
color: #ffffff;
}

/* barra menú sección*/
#section-nav {
background: #616161;
}
/* color texto barra menú sección*/
#section-nav p {
color: #b6b6b6;
}


/* item menú sección*/
#section-nav li a {
color: #b6b6b6;
text-shadow: none;
}

/* item menú sección activo*/
#section-nav li a:hover, #section-nav  a:hover, #section-nav .active , #section-nav .open a, #section-nav .open a:hover, #section-nav .open a:focus {
color: #fff;
background: #474747;
}

/* item menú sección activo*/
#section-nav .active {
color: #fff;
}

/* menu desplegable sección item destacado*/
#section-nav li .sum-league {
color: #474747;
font-weight: bold;
}

/* flecha menú desplegable menú sección*/
#section-nav a .caret, #section-nav a:hover .caret, #section-nav a:focus .caret {
border-top-color: #474747;
border-bottom-color: #474747;
}

/* menu desplegable sección item destacado hover*/
#section-nav li .sum-league:hover
{
	color: #fff;
	background: #f59245 !important;
	font-weight: bold;
}


/* links generales*/
a {
color: #666;
text-decoration: none;
}

/* botón principal*/
.btn-primary {
color: #ffffff;
background-color: #444;
border-color: #333;
}
/* botón secundario*/
.btn-success {
color: #ffffff;
background-color: #5cb85c;
border-color: #4cae4c;
}
/* Bolitas autosave*/
.double-bounce1, .double-bounce2 {
  background-color: #C80B42;
}



/* botón principal activo/hover*/
.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open .dropdown-toggle.btn-primary {
color: #ffffff;
background-color: #f59245;
border-color: #b56527;
}

/*-< PRONOSTICOS*/
/*---< precla y ganadores*/

/* titulo explicativo*/
.page-title {
background: none;
color: #fff;
}
/* podio ganadores*/
.winners-podium {
color: #2e2e2e;
background: #fff;
}

/*---< primera ronda*/

/* barra fecha de partido*/
.zone-table th, .zone-table th:hover 
{
background: #444;
color: #FFF;
}

/* info grupo*/
.zone-table .zone-info {
color: #333;
}

/* tabla stats tab*/
.matches-stats-tabs .nav-tabs > li > a {
background: #333;
}

/* fondo de la tabla*/
.matches-stats-tabs .tab-content {
background: #666;
}


/* tabla stats tab activo*/
.matches-stats-tabs .nav-tabs > li.active > a {
background: #777;
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