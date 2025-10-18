// components/AddStory.js
import { useState } from 'react';

function AddStory({ onAdd }) {
  const [title, setTitle] = useState('');
  const [content, setContent] = useState('');
  const [image, setImage] = useState('');
  const [category, setCategory] = useState('family');

  const handleSubmit = async (e) => {
    e.preventDefault();

    const newStory = { title, content, image, category };

    try {
      const res = await fetch('http://localhost:5000/api/stories', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(newStory),
      });

      if (!res.ok) throw new Error('Failed to add story');

      const savedStory = await res.json();
      onAdd(savedStory);  // Notify parent component
      setTitle('');
      setContent('');
      setImage('');
      setCategory('family');
    } catch (err) {
      console.error(err);
    }
  };

  return (
    <form onSubmit={handleSubmit} className="mb-4">
      <h2>Add New Story</h2>
      <div>
        <input
          type="text"
          placeholder="Title"
          value={title}
          required
          onChange={(e) => setTitle(e.target.value)}
        />
      </div>
      <div>
        <textarea
          placeholder="Content"
          value={content}
          required
          onChange={(e) => setContent(e.target.value)}
        />
      </div>
      <div>
        <input
          type="text"
          placeholder="Image URL"
          value={image}
          onChange={(e) => setImage(e.target.value)}
        />
      </div>
      <div>
        <select value={category} onChange={(e) => setCategory(e.target.value)}>
          <option value="family">Family</option>
          <option value="adults">Adult</option>
        </select>
      </div>
      <button type="submit">Add Story</button>
    </form>
  );
}

export default AddStory;
