<?php

namespace ejemploVehicles;

abstract class Vehicles
{
    protected $matricula;
    protected $marca;
    protected $model;
    protected $color;
    protected $en_marxa;

    abstract public function arrancar();
    abstract public function aturar();

    public function __construct($matricula, $marca, $model, $color, $en_marxa)
    {
        $this->matricula = $matricula;
        $this->marca = $marca;
        $this->model = $model;
        $this->color = $color;
        $this->en_marxa = $en_marxa;
    }
}
?>

<?php

class Cotxe extends Vehicles
{

    private $portes;
    private $cassette;

    public function __construct($matricula, $marca, $model, $color, $en_marxa, $portes, $cassette)
    {
        parent::__construct($matricula, $marca, $model, $color, $en_marxa);
        $this->portes = $portes;
        $this->cassette = $cassette;
    }

    public function arrancar()
    {
        $this->en_marxa = true;
    }

    public function aturar()
    {
        $this->en_marxa = false;
    }
}