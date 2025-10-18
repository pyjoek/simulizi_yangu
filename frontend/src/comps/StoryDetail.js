// StoryDetail.js
import React from 'react';
import { Link } from 'react-router-dom';

function StoryDetail({ story }) {
  return (
    <div className="story-detail">
      <h2>{story.title}</h2>
      <img src={story.image} alt={story.title} className="img-fluid" />
      <p>{story.content}</p>
      <Link to="/">Back to Stories List</Link>
    </div>
  );
}

export default StoryDetail;
