import { useEffect, useState } from 'react';
import StoryPart from './StoryPart';

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
          <StoryPart Img={story.image} Title={story.title} Story={story.content}/>
        </div>
      ))}
    </div>
  );
}

export default App;
