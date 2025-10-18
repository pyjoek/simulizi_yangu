import StoryPart from "../StoryPart";

// Family Component
const Family = ({ stories }) => {
  return (
    <div className='row'>
      {stories.map(story => (
        <div key={story.id} className='col-lg-3'>
          <StoryPart Img={story.image} Title={story.title} Story={story.content} />
        </div>
      ))}
    </div>
  );
};

export default Family;
