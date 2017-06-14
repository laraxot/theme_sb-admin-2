{{--
<link rel="stylesheet" href="http://localhost/lara/ptv/public/themes/sb-admin-2/css/styles.css" />
--}}
<style type="text/Css">

.test1
{
    border: solid 1px #FF0000;
    background: #FFFFFF;
    border-collapse: collapse;
}

table.morpion
{
	width: 100%;
    border:        dashed 1px #444444;
}

table.morpion td
{
    font-size:    15pt;
    font-weight:  bold;
    border:       solid 1px #000000;
    padding:      1px;
    text-align:   center;
    width:        25px;
}

table.morpion td.j1 { color: #0A0; }
table.morpion td.j2 { color: #A00; }

table
{
    width:  100%;
    border-top: solid 1px #555;
    border-left: solid 1px #555;
}

th
{
    text-align: center;
    border: solid 1px #113300;
    background: #EEFFEE;
}

td
{
    /*text-align: left;*/
    border-right: solid 1px #444;
    border-bottom: solid 1px #444;
}

td.col1
{
    border: solid 1px navy;
    text-align: right;
}

</style>

@yield('section')
