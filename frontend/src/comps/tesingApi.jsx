import { useEffect, useState } from 'react';
import Adult from './category/adult';
import Family from './category/family';
import AddStory from './AddStory';

function App() {
  const [stories, setStories] = useState([]);
  const [category, setCategory] = useState('family');
  const [showAddStoryModal, setShowAddStoryModal] = useState(false);
  const [showModal, setShowModal] = useState(false);
  const [title, setTitle] = useState('');
  const [content, setContent] = useState('');
  const [image, setImage] = useState('');
  
  // Toggle modal visibility
  const handleShow = () => setShowModal(true);
  const handleClose = () => setShowModal(false);

  const handleImageUpload = (e) => {
    setImage(e.target.files[0]); // Store the selected file
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    // const newStory = { title, content, image, category };
    // console.log(newStory)

    const formData = new FormData();
    formData.append('image', image); // Attach image file to FormData
    formData.append('title', title);
    formData.append('content', content);
    formData.append('category', category);
    
    try {
      const res = await fetch('http://localhost:5000/api/newStory', {
        method: 'POST',
        body: JSON.stringify(formData),
      });
      
      if (!res.ok) throw new Error('Failed to add story');
      
      // const savedStory = await res.json();
      // onAdd(savedStory); 
      setTitle('');
      setContent('');
      setImage(null);
      setCategory('family');
    } catch (err) {
      console.error(err);
    }
  };

  useEffect(() => {
    fetchStories();
  }, []);

  const fetchStories = () => {
    fetch('http://localhost:8000/api/stories')
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
                <form onSubmit={handleSubmit}>
                  <div className="form-group">
                    <label htmlFor="title" className="col-form-label">Title:</label>
                    <input
                      type="text"
                      className="form-control"
                      id="title"
                      value={title}
                      onChange={(e) => setTitle(e.target.value)}
                      required
                    />
                  </div>
                  <div className="form-group">
                    <label htmlFor="content" className="col-form-label">Content:</label>
                    <textarea
                      className="form-control"
                      id="content"
                      value={content}
                      onChange={(e) => setContent(e.target.value)}
                      required
                    />
                  </div>
                  <div className="form-group">
                    <label htmlFor="image">Upload Image:</label>
                    <input
                      type="file"
                      id="image"
                      className="form-control"
                      onChange={handleImageUpload}
                    />
                  </div>
                  <div className="form-group">
                    <label htmlFor="category" className="col-form-label">Category:</label>
                    <select
                      className="form-control"
                      id="category"
                      value={category}
                      onChange={(e) => setCategory(e.target.value)}
                    >
                      <option value="family">Family</option>
                      <option value="adults">Adult</option>
                    </select>
                  </div>
                  <div className="modal-footer">
                    <button type="button" className="btn btn-secondary" onClick={handleClose}>Close</button>
                    <button type="submit" className="btn btn-primary">Save Story</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      )}

      <div className="row justify-content-center text-center mb-3 mt-4">
        <div className="col-12 d-flex flex-column flex-md-row justify-content-center align-items-center">
          <h1 className="mr-md-5 mb-3 mb-md-0">Stories</h1>
          <div className="d-flex gap-2">
            <button onClick={() => setCategory('family')} className="btn btn-secondary mr-2">Family</button>
            <button onClick={() => setCategory('adults')} className="btn btn-secondary mr-2">Adult</button>
          </div>
            <button type="button" className="btn btn-primary ml-3" onClick={handleShow}>Add New Story</button>

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
