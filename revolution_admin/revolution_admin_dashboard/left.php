<div class="sidebar-menu">
	<header class="logo1">
		<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
    </header>
	<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
    <div class="menu">
        <ul id="menu" >
            <li><a href="../index.php?mod=slider&do=list"><i class="fa fa-tachometer"></i> <span>Home</span></a></li>
            <li  id="menu-academico" style="min-height:50px;" ><a href="#"><i class="fa fa-table" style="float:left"></i> <span style="float:left"> Students</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=student&do=list">Student List</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=student&do=addedit">Add New Student</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=student&do=adduplode">Uplode Student List</a></li>
                </ul>
            </li>
            <li id="menu-academico" style="min-height:50px" ><a href="#"><i class="fa fa-table" style="float:left"></i> <span style="float:left">Attendance list</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=attendance&do=addedit1&month=jan">January</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=attendance&do=addedit1&month=feb">February</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=attendance&do=addedit1&month=march">March</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=attendance&do=addedit1&month=april">April</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=attendance&do=addedit1&month=may">May</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=attendance&do=addedit1&month=june">June</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=attendance&do=addedit1&month=july">July</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=attendance&do=addedit1&month=august">August</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=attendance&do=addedit1&month=september">September</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=attendance&do=addedit1&month=october">October</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=attendance&do=addedit1&month=nov">November</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=attendance&do=addedit1&month=dece">December</a></li>
                </ul>
            </li>
            <li><a href="index.php?mod=attendance&do=addeditm"><i class="fa fa-tachometer"></i> <span>Attendance</span></a></li>
            
            <li id="menu-academico" style="min-height:50px" ><a href="#"><i class="fa fa-table" style="float:left"></i> <span style="float:left"> Class</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=class_subject&do=list">class List</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=class_subject&do=addedit">Add New Class</a></li>
                </ul>
            </li>
            <li id="menu-academico" style="min-height:50px" ><a href="#"><i class="fa fa-table" style="float:left"></i> <span style="float:left"> Test</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=test&do=class">Test List</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="index.php?mod=test&do=addedit">Add New</a></li>
                    <li id="menu-academico-avaliacoes" title="Uplode Test list by excle sheet"><a href="index.php?mod=test&do=addedit1">Uplode Test List</a></li>
                </ul>
            </li>
            <li><?php if(isset($_SESSION['logindtl'])){?><a href="../index.php?mod=login&do=logout"><i class="fa fa-tachometer"></i> <span>logout</span></a><?php } ?>
            </li>
        </ul>    </div>
</div>
<div class="clearfix"></div>
							