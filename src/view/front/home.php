<?php
require_once "../resources/base-top.php";
$stmtMateriaisGeral = MaterialDAO::getMateriaisGeral();
$stmtServicosGeral = ServicoDAO::getServicosGeral();
?>
<div>
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <img src="../../../css/images/icons/menu-outline.svg">
            </div>
            <!-- search -->
            <div class="titleTopBar">
                <h2>Home Page</h2>
            </div>
            <!-- userImg -->
            <div class="user">
                <img src="../../../css/images/user.jpg">
            </div>
        </div>
        <!-- cards -->
        <div class="cardBox">
            <div class="cardeRealTotal">
                <div class="cardeTop">
                    <h2>Valor Total</h2>
                    <input type="text" id="iptSomaRealTotal" readonly>
                    <div class="iconBx">
                        <img src="../../../css/images/icons/bag-add-outline.svg">
                    </div>
                </div>
            </div>
            <div class="cardeAprovar">
                <div class="cardeTop">
                    <h2>Aprovar</h2>
                    <input type="text" id="iptCountAprovar" readonly>
                    <div class="iconBx">
                        <img src="../../../css/images/icons/sync-outline.svg">
                    </div>
                </div>
            </div>
            <div class="cardeAprovado">
                <div class="cardeL">
                    <h2>Aprovado</h2>
                    <input type="text" id="iptCountAprovado" readonly>
                    <div class="iconBx">
                        <img src="../../../css/images/icons/checkmark-outline.svg">
                    </div>
                </div>
                <div class="cardeR">
                    <h2>Reprovado</h2>
                    <input type="text" id="iptCountReprovado" readonly>
                    <div class="iconBx">
                        <img src="../../../css/images/icons/close-outline.svg">
                    </div>
                </div>
            </div>
            <div class="cardeAutorizado">
                <div class="cardeL">
                    <h2>Autorizado</h2>
                    <input type="text" id="iptCountAutorizado" readonly>
                    <div class="iconBx">
                        <img src="../../../css/images/icons/checkmark-circle-outline.svg">
                    </div>
                </div>
                <div class="cardeR">
                    <h2>Desautorizado</h2>
                    <input type="text" id="iptCountDesautorizado" readonly>
                    <div class="iconBx">
                        <img src="../../../css/images/icons/close-circle-outline.svg">
                    </div>
                </div>
            </div>
        </div>
        <div class="cardFiltros">
            <div class="cptFiltros">
                <div>
                    <select name="cptEquipe" id="cptEquipe">
                        <option value="">Equipe</option>
                        <option value="Murilo">Murilo</option>
                        <option value="Daves">Daves</option>
                        <option value="Gedeon">Gedeon</option>
                        <option value="Jefferon">Jefferon</option>
                        <option value="Oscar">Oscar</option>
                        <option value="Rodrigo">Rodrigo</option>
                        <option value="Agmar">Agmar</option>
                        <option value="Messias">Messias</option>
                        <option value="Rodolfo">Rodolfo</option>
                        <option value="Reisson">Reisson</option>
                        <option value="Flavio">Flavio</option>
                        <option value="Marcos">Marcos</option>
                        <option value="Joselan">Joselan</option>
                    </select>
                </div>
                <div>
                    <select name="cptPeriodo" id="cptPeriodo">
                        <option value="">Período</option>
                        <option value="safra">Safra</option>
                        <option value="entre_safra">E-Safra</option>
                    </select>
                </div>
                <div>
                    <select name="cptSolicitante" id="cptSolicitante">
                        <option value="">Solicitante</option>
                        <option value="jvstomaz">jvstomaz</option>
                        <option value="ctsilva">ctsilva</option>
                        <option value="vgsouza">vgsouza</option>
                        <option value="bscastro">bscastro</option>
                        <option value="marsantos">marsantos</option>
                    </select>
                </div>
                <div>
                    <select name="cptStatus" id="cptStatus">
                        <option value="">Status</option>
                        <option value="APROVAR">Aprovar</option>
                        <option value="APROVADO">Aprovado</option>
                        <option value="REPROVADO">Reprovado</option>
                        <option value="AUTORIZADO">Autorizado</option>
                        <option value="NAO_AUTORIZADO">Desautorizado</option>
                    </select>
                </div>
                <div>
                    <select name="cptPriord" id="cptPriord">
                        <option value="">Prioridade</option>
                        <option value="0">[0] Baixa</option>
                        <option value="1">[1] Média</option>
                        <option value="2">[2] Alta</option>
                    </select>
                </div>
                <div>
                    <input type="month" id="iptFiltroMes">
                </div>
            </div>
        </div>
        <div class="details">
            <div class="recentOrders">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="limateriais active">
                        <a href="#tab-table1" id="tab-table1">Materiais</a>
                    </li>
                    <li class="liservicos">
                        <a href="#tab-table2" id="tab-table2">Serviços</a>
                    </li>
                </ul>
                <div class="tab-content">
                <?php 
                if ($_SESSION['codigoAcesso'] == $engenheiro):
                    require_once '../resources/table-eng.php';
                endif;
                if ($_SESSION['codigoAcesso'] == $coordenador):
                    require_once '../resources/table-crd.php';
                endif;
                if ($_SESSION['codigoAcesso'] == $gerente):
                    require_once '../resources/table-ger.php';
                endif;
                ?>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../../scripts/js/vendor/jquery/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="../../../scripts/js/js.bootstrap/3.3.7/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../../scripts/datatables/DataTables-1.12.1/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../../../scripts/datatables/datatables.js"></script>
    <script type="text/javascript" src="../../../scripts/js/vendor/jquery/jquery.mask.js"></script>
    <script type="text/javascript" src="../../../scripts/js/vendor/numeral/numeral.min.js"></script>
    <script type="text/javascript" src="../../../scripts/js/eng/home.js"></script>  
</div>
<?php require_once "../resources/base-bot.php"; ?>