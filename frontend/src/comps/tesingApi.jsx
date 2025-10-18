// import { useEffect, useState } from 'react';
// import StoryPart from './StoryPart';
// import Adult from './category/adult';  // Make sure this file path is correct
// import Family from './category/family';  // Same for this

// function App() {
//   const [stories, setStories] = useState([]);
//   const [category, setCategory] = useState('family');  // Default category is family

//   useEffect(() => {
//     fetch('http://localhost:5000/api/stories')
//       .then(res => res.json())
//       .then(data => setStories(data))
//       .catch(err => console.error(err));
//   }, []);

//   const filteredStories = stories.filter(story => story.category === category);

//   return (
//     <div>
//       <div className='row'>
//         <h1>Stories</h1>
//         <div>
//           <button onClick={() => setCategory('family')}>Family</button>
//           <button onClick={() => setCategory('adults')}>Adult</button>
//         </div>
//       </div>

//       {/* Render filtered stories based on category */}
//       <div className='row'>
//         {category === 'family' ? (
//           <Family stories={filteredStories} />
//         ) : (
//           <Adult stories={filteredStories} />
//         )}
//       </div>
//     </div>
//   );
// }

// export default App;



import { useEffect, useState } from 'react';
import Adult from './category/adult';
import Family from './category/family';
import AddStory from './AddStory.js';

function App() {
  const [stories, setStories] = useState([]);
  const [category, setCategory] = useState('family');

  useEffect(() => {
    fetchStories();
  }, []);

  const fetchStories = () => {
    fetch('http://localhost:5000/api/stories')
      .then(res => res.json())
      .then(data => setStories(data))
      .catch(err => console.error(err));
  };

  const handleAddStory = (newStory) => {
    setStories(prev => [...prev, newStory]);
  };

  const filteredStories = stories.filter(story => story.category === category);

  return (
    <div className="container">
      <div className="row justify-content-center text-center mb-3 mt-4">
        <div className="col-12 d-flex flex-column flex-md-row justify-content-center align-items-center">
          <h1 className="mr-md-5 mb-3 mb-md-0">Stories</h1>
          <div className="d-flex gap-2">
            <button onClick={() => setCategory('family')} className="btn btn-primary mr-2">Family</button>
            <button onClick={() => setCategory('adults')} className="btn btn-secondary mr-2">Adult</button>
          </div>
          <button className="btn btn-secondary ml-5">Adult</button>
        </div>
      </div>

      {/* <AddStory onAdd={handleAddStory} /> */}

      <div className="row">
        {category === 'family' ? (
          <Family stories={filteredStories} />
        ) : (
          <Adult stories={filteredStories} />
        )}
      </div>
    </div>
  );
}

export default App;
