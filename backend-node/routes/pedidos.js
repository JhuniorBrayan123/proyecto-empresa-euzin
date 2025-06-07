// routes/pedidos.js
const express = require('express');
const router = express.Router();
const mongoose = require('mongoose');

// Esquema del pedido
const PedidoSchema = new mongoose.Schema({
  id_pedido: String,
  id_cliente: String,
  fecha: {
    type: Date,
    default:Date.now
  },
  estado: String,
  id_vehiculo: String,
  id_conductor: String
});

// Modelo
const Pedido = mongoose.model('Pedido', PedidoSchema);

// Obtener todos los pedidos
router.get('/api/pedidos', async (req, res) => {
  try {
    const pedidos = await Pedido.find();
    res.json(pedidos);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

// Crear un nuevo pedido
router.post('/api/pedidos', async (req, res) => {
  try {
    const nuevo = new Pedido(req.body);
    await nuevo.save();
    res.status(201).json(nuevo);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
});

module.exports = router;
