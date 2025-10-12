// import express from 'express';
// import cors from 'cors';

// const app = express();
// const PORT = 5000;

// app.use(cors());
// app.use(express.json())

// // testing the api route
// app.get('/api/message', (req, res) => {
//     res.json({"message": 'Hello from backend'})
// });

// app.listen(PORT, () => {
//     console.log(`Server running on port http://localhost:{PORT}`)
// })



import express from 'express'
import cors from 'cors'
import pkg from 'pg'

const { Pool } = pkg;

const app = express();
const PORT = 5000;

app.use(cors())
app.use(express.json())

// config database
const pool = new Pool({
    host: process.env.DB_HOST,
    port: process.env.DB_PORT,
    user: process.env.DB_USER,
    password: process.env.DB_PASSWORD,
    database: process.env.DB_NAME,
});

// create table and somw data
async function initDB() {
    await pool.query(`
        create table if not exists stories (
            id serial primary key,
            title text not null,
            image text,
            content text
        );
    `);

    const result = await pool.query('select * from stories;')
    const count = parseInt(result.rowa[0].count)

    if (count === 0) {
        console.log("seeding database...")
        await pool.query(`
            insert into stories (title, image, content) values 
            ('First Story', 'https://via.placeholder.com/150', 'This is the first story'),
            ('Second Story', 'https://via.placeholder.com/150', 'This is the second story');
        `);
    }
}

initDB().catch(console.log)

// get storeis
app.get('/api/stories', async (req, res) => {
    try {
        const result = await pool.query('selecr * from stories;');
        res.json(result.rowa)
    } catch (err) {
        console.error(err);
        res.status(500).send('Server error')
    };
})

app.listen(PORT, () => {
    console.log(`Backend running at http://localhost:${PORT}`)
})