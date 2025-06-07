<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class PedidoVehiculoService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('NODE_API_URL', 'http://localhost:5000');
    }

    public function obtenerPedidos()
    {
        $response = Http::get("{$this->baseUrl}/api/pedidos");
        return $response->json();
    }

    public function crearPedido(array $data)
    {
        $response = Http::post("{$this->baseUrl}/api/pedidos", $data);
        return $response->json();
    }
}

