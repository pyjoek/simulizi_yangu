import express from 'express'
import cors from 'cors'
import mysql from 'mysql2/promise'

const app = express();
const PORT = 5000;

app.use(cors());
app.use(express.json());

// Configure MySQL connection
const pool = mysql.createPool({
  host: '127.0.0.1',
  port: "3306",
  user: "root",
  password: "",
  database: "storiesdb",
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
        category VARCHAR(100),
        content TEXT
      );
    `);

    // Check if table is empty
    const [rows] = await connection.query('SELECT COUNT(*) AS count FROM stories;');
    const count = rows[0].count;

    if (count === 0) {
      console.log("Seeding database...");
      await connection.query(`
        INSERT INTO stories (title, image, category,  content) VALUES 
        ('First Story', 'https://via.placeholder.com/150', 'family', 'This is the first story'),
        ('Second Story', 'https://via.placeholder.com/150', 'adults', 'This is the second story');
      `);
      console.log('Done Seeding...')
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
    // res.json(rows[0]['category']);
  } catch (err) {
    console.error(err);
    res.status(500).send('Server error');
  }
});

// Add new stories
app.post('/api/newStory', async (req, res) => {
  const { title, image, category, content } = req.body;  // Destructure the incoming data

  console.log('Received data:', { title, image, category, content });

  // Check if all fields are provided
  if (!title || !image || !category || !content) {
    return res.status(400).json({ message: 'All fields are required' });
  }

  try {
    // Insert data into the database (adjust query based on your actual DB and schema)
    const [row] = await pool.query(`
      INSERT INTO stories (title, image, category, content) 
      VALUES (?, ?, ?, ?);
    `, [title, image, category, content]);

    // Return success response with inserted data (or just a success message)
    res.status(201).json({ message: 'Story added successfully', story: { title, image, category, content } });

  } catch (err) {
    console.error('Database error:', err);
    res.status(500).json({ message: 'Server error while adding story' });
  }
});

app.listen(PORT, () => {
  console.log(`Backend running at http://localhost:${PORT}`);
});