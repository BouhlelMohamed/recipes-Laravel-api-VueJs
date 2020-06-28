    <?php 
    
        function routes(){
            switch ($_SERVER['REQUEST_URI']) {
                case '/':
                    require_once "templates/home.php";
                    break;
                case '/mes-recettes':
                    require_once "templates/allRecipes.php";
                    break;
            }
        }

        // Routes 
        require_once 'base/navbar.php'; 

        routes();

        require_once 'base/footer.php'; 
