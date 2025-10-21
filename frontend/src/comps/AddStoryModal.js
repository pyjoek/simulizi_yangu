import React from 'react';

const AddStoryModal = ({
  title, content, image, category, setTitle, setContent, setCategory, handleSubmit, handleImageUpload, handleClose
}) => {
  const imagePreview = image ? URL.createObjectURL(image) : null;

  return (
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
                {imagePreview && <img src={imagePreview} alt="Preview" style={{ width: '100%', marginTop: '10px' }} />}
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
  );
};

export default AddStoryModal;
