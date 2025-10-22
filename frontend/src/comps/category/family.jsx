const Family = ({ stories }) => {
  
  return (
    <div className="row justify-content-between">
      {stories.map(story => (
        <div key={story.id} className='col-lg-3 mb-4 ml-5'>
          <div className="px-3 py-2 bg-white rounded shadow-sm d-inline-block" style={{ width: '400px', height: '300px' }}>
          {story.title}
            <img src={`http://127.0.0.1:8000/storage/${story.image}`} alt={story.title} 
            style={{ width: '100%', height: '85%', objectFit: 'cover' }}/>
          </div>
      </div>
      ))}
    </div>
  );
};

export default Family;

