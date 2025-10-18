// import StoryPart from "../StoryPart";

// Family Component
const Family = ({ stories }) => {
  return (
    <div className='row'>
      {stories.map(story => (
        <div key={story.id} className='col-lg-3'>
          <h1>{story.title}</h1>
          <img src={story.imgage} alt={story.title} />
          {/* <StoryPart Img={story.image} Title={story.title} Story={story.content} /> */}
        </div>
      ))}
    </div>
  );
};

export default Family;

