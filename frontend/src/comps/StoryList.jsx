import React from 'react';
import StoryCard from './StoryCard'; // Assuming you have a component for rendering individual stories

const StoryList = ({ stories }) => (
  <div className="row">
    {stories.map((story) => (
      <div key={story.id} className="col-12 col-md-4">
        <StoryCard story={story} />
      </div>
    ))}
  </div>
);

export default StoryList;
