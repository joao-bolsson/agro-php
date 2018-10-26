<?php
session_start();

include_once 'controller/php/class/Select.class.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AgroPRO | Início</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Agro</b>PRO</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">João Bolsson</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    João Bolsson - Produtor
                                    <small>Membro desde Out. 2018</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>João Bolsson</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li>
                    <a href="index.php">
                        <i class="fa fa-home"></i> <span>Início</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:abreModal('#startCrop');">
                        <i class="fa fa-calendar"></i> <span>Nova Safra</span>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <i class="fa fa-bar-chart"></i> <span>Rastreabilidade</span>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <i class="fa fa-adjust"></i> <span>Análise de Solo</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Início
                <small>tudo começa aqui</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Safras</h3>
                </div>
                <div class="box-body">
                    <table id="tableCrops" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Cultura</th>
                            <th>Data de Início</th>
                            <th>Status</th>
                            <th>Opções</th>
                        </tr>
                        </thead>
                        <tbody id="tbodyCrops"></tbody>
                    </table>
                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Versão</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2018 <a href="https://github.com/joao-bolsson/">AgroPRO</a>.</strong> Todos os direitos
        reservados
    </footer>

    <div aria-hidden="true" class="modal fade" id="startCrop" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Nova Safra</h4>
                </div>
                <form id="formStartCrop">
                    <input type="hidden" name="form" value="startCrop"/>
                    <input type="hidden" name="id_user" value="1"/>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tipo de Cultura</label>
                            <select class="form-control" name="id_type" required>
                                <?php
                                $types = Select::getCultureTypes();
                                foreach ($types as $type) {
                                    if ($type instanceof CultureType) {
                                        echo "<option value=\"" . $type->getId() . "\">" . $type->getName() . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Cultura</label>
                            <select class="form-control" name="id_cult" required>
                                <?php
                                $types = Select::getCultures();
                                foreach ($types as $type) {
                                    if ($type instanceof Culture) {
                                        echo "<option value=\"" . $type->getId() . "\">" . $type->getName() . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" style="width: 100%;"><i class="fa fa-send"></i>&nbsp;Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div aria-hidden="true" class="modal fade" id="doImplementation" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Implementação</h4>
                </div>
                <form id="formDoImplementation">
                    <input type="hidden" name="form" value="doImplementation"/>
                    <input id="doImplementationIdCrop" type="hidden" name="id_crop" value="0"/>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Mão de Obra</label>
                            <input class="form-control" name="labor" type="number" step="0.01" min="0.01" value="1029"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Maquinário</label>
                            <input class="form-control" name="machines" type="number" step="0.01" min="0.01"
                                   value="18271" required>
                        </div>
                        <div class="form-group">
                            <label>Fertilizantes</label>
                            <input class="form-control" name="fertilizing" type="number" step="0.01" min="0.01"
                                   value="18271" required>
                        </div>
                        <div class="form-group">
                            <label>Semeadura</label>
                            <input class="form-control" name="seeding" type="number" step="0.01" min="0.01"
                                   value="18271" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" style="width: 100%;"><i class="fa fa-send"></i>&nbsp;Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div aria-hidden="true" class="modal fade" id="doMaintenance" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Manutenção</h4>
                </div>
                <form id="formDoMaintenance">
                    <input type="hidden" name="form" value="doMaintenance"/>
                    <input id="doMaintenanceIdCrop" type="hidden" name="id_crop" value="0"/>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Mão de Obra</label>
                            <input class="form-control" name="labor" type="number" step="0.01" min="0.01" value="1029"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Maquinário</label>
                            <input class="form-control" name="machines" type="number" step="0.01" min="0.01"
                                   value="18271" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" style="width: 100%;"><i class="fa fa-send"></i>&nbsp;Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div aria-hidden="true" class="modal fade" id="doHarvest" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Colheita</h4>
                </div>
                <form id="formDoHarvest">
                    <input type="hidden" name="form" value="doHarvest"/>
                    <input id="doHarvestIdCrop" type="hidden" name="id_crop" value="0"/>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Mão de Obra</label>
                            <input class="form-control" name="labor" type="number" step="0.01" min="0.01" value="1029"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Maquinário</label>
                            <input class="form-control" name="machines" type="number" step="0.01" min="0.01"
                                   value="18271" required>
                        </div>
                        <div class="form-group">
                            <label>Transporte</label>
                            <input class="form-control" name="transport" type="number" step="0.01" min="0.01"
                                   value="18271" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" style="width: 100%;"><i class="fa fa-send"></i>&nbsp;Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div aria-hidden="true" class="modal fade" id="applyDefensives" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Aplicar Defensivos</h4>
                </div>
                <form id="formApplyDefensives">
                    <input type="hidden" name="form" value="applyDefensives"/>
                    <input id="applyDefensivesIdCrop" type="hidden" name="id_crop" value="1"/>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Defensivo</label>
                            <select class="form-control" name="id_defensive" required>
                                <?php
                                $types = Select::getDefensives(1);
                                foreach ($types as $type) {
                                    if ($type instanceof Product) {
                                        echo "<option value=\"" . $type->getId() . "\">" . $type->getDescription() . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Aplicações</label>
                            <input class="form-control" name="aplications" type="number" step="1" min="1"
                                   value="1" required>
                        </div>
                        <div class="form-group">
                            <label>Valor</label>
                            <input class="form-control" name="value" type="number" step="0.01" min="0.01"
                                   value="19287" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" style="width: 100%;"><i class="fa fa-send"></i>&nbsp;Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div aria-hidden="true" class="modal fade" id="showInfoCrop" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Informações da Safra, LOTE: 01/2018</h4>
                </div>
                <div class="modal-body">
                    <h4>Implementação</h4>
                    <hr/>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Gasto</th>
                            <th>Valor</th>
                        </tr>
                        </thead>
                        <tbody id="tbodyImpl">
                        <tr>
                            <td>Mão de Obra</td>
                            <td>R$ 2819.78</td>
                        </tr>
                        <tr>
                            <td>Maquinário</td>
                            <td>R$ 2819.78</td>
                        </tr>
                        <tr>
                            <td>Fertilizantes</td>
                            <td>R$ 2819.78</td>
                        </tr>
                        <tr>
                            <td>Semeadura</td>
                            <td>R$ 2819.78</td>
                        </tr>
                        </tbody>
                    </table>
                    <h4>Manutenção</h4>
                    <hr/>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Gasto</th>
                            <th>Valor</th>
                        </tr>
                        </thead>
                        <tbody id="tbodyImpl">
                        <tr>
                            <td>Mão de Obra</td>
                            <td>R$ 2819.78</td>
                        </tr>
                        <tr>
                            <td>Maquinário</td>
                            <td>R$ 2819.78</td>
                        </tr>
                        <tr>
                            <td>Defensivos</td>
                            <td>R$ 2819.78</td>
                        </tr>
                        </tbody>
                    </table>
                    <h4>Colheita</h4>
                    <hr/>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Gasto</th>
                            <th>Valor</th>
                        </tr>
                        </thead>
                        <tbody id="tbodyImpl">
                        <tr>
                            <td>Mão de Obra</td>
                            <td>R$ 2819.78</td>
                        </tr>
                        <tr>
                            <td>Maquinário</td>
                            <td>R$ 2819.78</td>
                        </tr>
                        <tr>
                            <td>Transporte</td>
                            <td>R$ 2819.78</td>
                        </tr>
                        </tbody>
                    </table>
                    <h4>Relatório</h4>
                    <hr/>
                    <table class="table table-bordered table-striped">
                        <tbody id="tbodyImpl">
                        <tr>
                            <td>Total da Implantação</td>
                            <td style="color: red">R$ 2819.78</td>
                        </tr>
                        <tr>
                            <td>Total da Manutenção</td>
                            <td style="color: red">R$ 2819.78</td>
                        </tr>
                        <tr>
                            <td>Total da Colheita</td>
                            <td style="color: green">R$ 2819.78</td>
                        </tr>
                        <tr>
                            <td>Lucro</td>
                            <td style="color: green">R$ 2819.78</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery 3 -->
<!--<script src="bower_components/jquery/dist/jquery.min.js"></script>-->
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
</script>

<script src="js/index.js"></script>
</body>
</html>
