import express from 'express'
import cors from 'cors'
import mysql from 'mysql2/promise'

const app = express();
const PORT = 5000;

app.use(cors());
app.use(express.json());

// Configure MySQL connection
const pool = mysql.createPool({
  host: process.env.DB_HOST,
  port: process.env.DB_PORT,
  user: process.env.DB_USER,
  password: process.env.DB_PASSWORD,
  database: process.env.DB_NAME,
});

// Initialize database: create table and seed data if empty
async function initDB() {
  const connection = await pool.getConnection();

  try {
    // Create table if not exists
    await connection.query(`
      CREATE TABLE IF NOT EXISTS stories (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        image TEXT,
        content TEXT
      );
    `);

    // Check if table is empty
    const [rows] = await connection.query('SELECT COUNT(*) AS count FROM stories;');
    const count = rows[0].count;

    if (count === 0) {
      console.log("Seeding database...");
      await connection.query(`
        INSERT INTO stories (title, image, content) VALUES 
        ('First Story', 'https://via.placeholder.com/150', 'This is the first story'),
        ('Second Story', 'https://via.placeholder.com/150', 'This is the second story');
      `);
    }
  } catch (err) {
    console.error('Error initializing database:', err);
  } finally {
    connection.release();
  }
}

initDB().catch(console.log);

// Get stories route
app.get('/api/stories', async (req, res) => {
  try {
    const [rows] = await pool.query('SELECT * FROM stories;');
    res.json(rows);
  } catch (err) {
    console.error(err);
    res.status(500).send('Server error');
  }
});

app.listen(PORT, () => {
  console.log(`Backend running at http://localhost:${PORT}`);
});