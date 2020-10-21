<?php

    class Rodape{

        function exibe(){
            echo '
				<script>var usuario_global = '.@$_SESSION["usuario"]["id_usuario"].';</script>
                <script src="js/popper.min.js"></script>
                <script src="js/jquery-3.2.1.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/bootstrap-datepicker.min.js"></script>
                <script src="js/bootstrap-datepicker.pt-BR.min.js"></script>
                <script src="js/index.js"></script>
				<script src="js/md5.js"></script>
                <script src="js/inserir_editar_remover.js"></script>
            </body>
            </html>';
        }


    }


?>