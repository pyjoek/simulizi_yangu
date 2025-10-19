// import StoryPart from "../StoryPart";

// Family Component
const Family = ({ stories }) => {
  return (
    <div className='row'>
      {stories.map(story => (
        <div key={story.id} className='col-lg-4'>
          <div className="px-3 py-2 bg-white rounded shadow-sm d-inline-block">
          {story.title}
        </div>
      </div>

      ))}
    </div>
  );
};

export default Family;

