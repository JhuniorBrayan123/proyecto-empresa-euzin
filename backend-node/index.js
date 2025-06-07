require('dotenv').config();
const express = require('express');
const cors = require('cors');
const connectDB = require('./db');

const app = express();
const PORT = process.env.PORT || 5000;

// Middlewares
app.use(cors());
app.use(express.json());

// Conexión a MongoDB
connectDB();

// ✅ Importar y montar rutas (solo una vez)
const pedidosRoutes = require('./routes/pedidos');
app.use(pedidosRoutes);

// Ruta de prueba
app.get('/', (req, res) => {
  res.send('Servidor Node.js funcionando!');
});


// Escuchar en el puerto
app.listen(PORT, () => {
  console.log(`🚀 Servidor escuchando en http://localhost:${PORT}`);
});
