<?php
namespace App\Http\Controllers;

use App\Services\PedidoVehiculoService;
use Illuminate\Http\Request;

class PedidoVehiculoController extends Controller
{
    protected $servicio;

    public function __construct(PedidoVehiculoService $servicio)
    {
        $this->servicio = $servicio;
    }

    public function index()
    {
        return response()->json($this->servicio->obtenerPedidos());
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'id_pedido', 'id_cliente', 'fecha', 'estado',
            'id_vehiculo', 'id_conductor'
        ]);

        return response()->json($this->servicio->crearPedido($data));
    }
}
