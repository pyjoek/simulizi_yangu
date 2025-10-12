import { useEffect, useState } from 'react';

function App() {
  const [stories, setStories] = useState([]);

  useEffect(() => {
    fetch('http://localhost:5000/api/stories')
      .then(res => res.json())
      .then(data => setStories(data))
      .catch(err => console.error(err));
  }, []);

  return (
    <div>
      <h1>Stories</h1>
      {stories.map((story) => (
        <div key={story.id}>
          <h2>{story.title}</h2>
          <img src={story.image} alt={story.title} width="150" />
          <p>{story.content}</p>
        </div>
      ))}
    </div>
  );
}

export default App;
