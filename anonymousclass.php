<?php 

$user = new class {

        private $nama;

        public function setName($value='')
        {
            # code...
        }

}

echo("<pre>");
print_r( $user );
exit(__class__.'@'.__method__.'@'.__line__.'@'.__FILE__);