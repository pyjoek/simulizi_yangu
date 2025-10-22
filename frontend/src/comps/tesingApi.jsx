// eslint-disable-next-line

import { useEffect, useState } from 'react';
import Family from './category/family';

function App() {
  const [stories, setStories] = useState([]);
  const [category, setCategory] = useState('family');
  const [showAddStoryModal, setShowAddStoryModal] = useState(false);
  const [showModal, setShowModal] = useState(false);
  const [title, setTitle] = useState('');
  const [content, setContent] = useState('');
  const [image, setImage] = useState('');
  
  const handleShow = () => setShowModal(true);
  const handleClose = () => setShowModal(false);

  const handleImageUpload = (e) => {
    setImage(e.target.files[0]);
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    const formData = new FormData();
    formData.append('image', image);
    formData.append('title', title);
    formData.append('content', content);
    formData.append('category', category);
    console.log(formData)
    
    try {
      const res = await fetch('http://127.0.0.1:8000/api/newStory', {
        method: 'POST',
        body: formData
      });
      
      if (!res.ok) throw new Error('Failed to add story');
      
      handleClose()
      setTitle('');
      setContent('');
      setImage(null);
      setCategory('Familia');
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
    setShowAddStoryModal(false);
  };

  const filteredStories = stories.filter(story => story.category === category);

  return (
    <div>
      
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
                      <option value="Mapenzi & Mahaba">Mapenzi & Mahaba</option>
                      <option value="Maisha">Maisha</option>
                      <option value="Familia">Familia</option>
                      <option value="Ndoto & Mafanikio">Ndoto & Mafanikio</option>
                      <option value="Ucheshi">Ucheshi</option>
                      <option value="Mashaka & Thriller">Mashaka & Thriller</option>
                      <option value="Ushairi & Ufantasia">Ushairi & Ufantasia</option>
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

      {/* Navigation Bar (with different background color) */}
      <div className="row justify-content-center text-center mb-3 p-2" style={{ backgroundColor: '#ffffffff', boxShadow: '2px 0 8px  rgba(0, 0, 0, 0.6)'}}>
        <div className="col-12 d-flex flex-column flex-md-row justify-content-center align-items-center container">
          <h1 className="mr-md-5 mb-3 mb-md-0">Stories</h1>
          <div className="d-flex gap-2">
            <button onClick={() => setCategory('Mapenzi & Mahaba')} className="btn btn-transparent text-dark border-0" style={{ backgroundColor: 'transparent' }}><b>Mapenzi & Mahaba</b></button>
            <button onClick={() => setCategory('Maisha')} className="btn btn-transparent text-dark border-0" style={{ backgroundColor: 'transparent' }}><b>Maisha</b></button>
            <button onClick={() => setCategory('Familia')} className="btn btn-transparent text-dark border-0" style={{ backgroundColor: 'transparent' }}><b>Familia</b></button>
            <button onClick={() => setCategory('Ndoto & Mafanikio')} className="btn btn-transparent text-dark border-0" style={{ backgroundColor: 'transparent' }}><b>Ndoto & Mafanikio</b></button>
            <button onClick={() => setCategory('Ucheshi')} className="btn btn-transparent text-dark border-0" style={{ backgroundColor: 'transparent' }}><b>Ucheshi</b></button>
            <button onClick={() => setCategory('Mashaka & Thriller')} className="btn btn-transparent text-dark border-0" style={{ backgroundColor: 'transparent' }}><b>Mashaka & Thriller</b></button>
            <button onClick={() => setCategory('Ushairi & Ufantasia')} className="btn btn-transparent text-dark border-0" style={{ backgroundColor: 'transparent' }}><b>Ushairi & Ufantasia</b></button>
          </div>
          <button type="button" className="btn btn-primary ml-3" onClick={handleShow}>Login</button>
        </div>
      </div>

      {/* Body Content (with different background color) */}
      <div className="mt-5">
        {category === 'Mapenzi & Mahaba' ? (
          <Family stories={filteredStories} />
        ) : category === 'Maisha' ? (
          <Family stories={filteredStories} /> 
        ) : category === 'Familia' ? (
          <Family stories={filteredStories} /> 
        ) : category === 'Ndoto & Mafanikio' ? (
          <Family stories={filteredStories} /> 
        ) : category === 'Ucheshi' ? (
          <Family stories={filteredStories} /> 
        ) : category === 'Mashaka & Thriller' ? (
          <Family stories={filteredStories} /> 
        ) : (
          <Family stories={filteredStories} /> 
        )
        }
      </div>
    </div>
  );
}

export default App;

