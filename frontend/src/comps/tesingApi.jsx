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
import AddStory from './AddStory'; // Ensure this is the correct import path

function App() {
  const [stories, setStories] = useState([]);
  const [category, setCategory] = useState('family');
  const [showAddStoryModal, setShowAddStoryModal] = useState(false); // State to manage modal visibility
  const [showModal, setShowModal] = useState(false);  // State to handle modal visibility
  
    // Toggle modal visibility
    const handleShow = () => setShowModal(true);
    const handleClose = () => setShowModal(false);

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
    setShowAddStoryModal(false); // Close the modal after adding a story
  };

  const filteredStories = stories.filter(story => story.category === category);

  return (
    <div className="container">
       {/* Modal component */}
      {showModal && (
        <div className="modal fade show" style={{ display: 'block' }} tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
          <div className="modal-dialog" role="document">
            <div className="modal-content">
              <div className="modal-header">
                <h5 className="modal-title" id="exampleModalLabel">Add New Story</h5>
                <button type="button" className="close" onClick={handleClose} aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div className="modal-body">
                <form>
                  <div className="form-group">
                    <label htmlFor="title" className="col-form-label">Title:</label>
                    <input type="text" className="form-control" id="title" />
                  </div>
                  <div className="form-group">
                    <label htmlFor="content" className="col-form-label">Content:</label>
                    <textarea className="form-control" id="content"></textarea>
                  </div>
                  <div className="form-group">
                    <label htmlFor="image" className="col-form-label">Image URL:</label>
                    <input type="text" className="form-control" id="image" />
                  </div>
                  <div className="form-group">
                    <label htmlFor="category" className="col-form-label">Category:</label>
                    <select className="form-select" id="category">
                      <option value="family">Family</option>
                      <option value="adults">Adult</option>
                    </select>
                  </div>
                </form>
              </div>
              <div className="modal-footer">
                <button type="button" className="btn btn-secondary" onClick={handleClose}>Close</button>
                <button type="button" className="btn btn-primary">Save Story</button>
              </div>
            </div>
          </div>
        </div>
      )}

      <div className="row justify-content-center text-center mb-3 mt-4">
        <div className="col-12 d-flex flex-column flex-md-row justify-content-center align-items-center">
          <h1 className="mr-md-5 mb-3 mb-md-0">Stories</h1>
          <div className="d-flex gap-2">
            <button onClick={() => setCategory('family')} className="btn btn-primary mr-2">Family</button>
            <button onClick={() => setCategory('adults')} className="btn btn-secondary mr-2">Adult</button>
          </div>
          
          {/* Button to trigger modal */}
      <button 
        type="button" 
        className="btn btn-primary mb-3" 
        onClick={handleShow}
      >
        Add New Story
      </button>
        </div>
      </div>

      {/* Show AddStory modal/form if showAddStoryModal is true */}
      {showAddStoryModal && <AddStory onAdd={handleAddStory} />}

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
