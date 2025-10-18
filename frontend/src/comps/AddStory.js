// import { useState } from 'react';

// function AddStory({ onAdd }) {
//   const [title, setTitle] = useState('');
//   const [content, setContent] = useState('');
//   const [image, setImage] = useState('');
//   const [category, setCategory] = useState('family');

//   const handleSubmit = async (e) => {
//     e.preventDefault();

//     const newStory = { title, content, image, category };
    
//     try {
//       const res = await fetch('http://localhost:5000/api/newStory', {
//         method: 'POST',
//         headers: {
//           'Content-Type': 'application/json',
//         },
//         body: JSON.stringify(newStory),
//       });
      
//       if (!res.ok) throw new Error('Failed to add story');
      
//       const savedStory = await res.json();
//       onAdd(savedStory); 
//       setTitle('');
//       setContent('');
//       setImage('');
//       setCategory('family');
//     } catch (err) {
//       console.error(err);
//     }
//   };

//   return (
//     <form onSubmit={handleSubmit} className="mb-4">
//       <h2>Add New Story</h2>
//       <div>
//         <input
//           type="text"
//           placeholder="Title"
//           value={title}
//           required
//           onChange={(e) => setTitle(e.target.value)}
//         />
//       </div>
//       <div>
//         <textarea
//           placeholder="Content"
//           value={content}
//           required
//           onChange={(e) => setContent(e.target.value)}
//         />
//       </div>
//       <div>
//         <input
//           type="text"
//           placeholder="Image URL"
//           value={image}
//           onChange={(e) => setImage(e.target.value)}
//         />
//       </div>
//       <div>
//         <select value={category} onChange={(e) => setCategory(e.target.value)}>
//           <option value="family">Family</option>
//           <option value="adults">Adult</option>
//         </select>
//       </div>
//       <button type="submit">Add Story</button>
//     </form>
//   );
// }

// export default AddStory;

import React, { useState } from 'react';

function AddStory() {
  const [showModal, setShowModal] = useState(false);  // State to handle modal visibility

  // Toggle modal visibility
  const handleShow = () => setShowModal(true);
  const handleClose = () => setShowModal(false);

  return (
    <div className="container mt-4">
      <h1>Stories</h1>

      {/* Button to trigger modal */}
      <button 
        type="button" 
        className="btn btn-primary mb-3" 
        onClick={handleShow}
      >
        Add New Story
      </button>

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
    </div>
  );
}

export default AddStory;
