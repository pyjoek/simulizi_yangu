function StoryPart ({Title, Story}) {
    return (
        <div>
            <h3>{Title}</h3>
            <textarea>{Story}</textarea>
        </div>
    )
}

export default StoryPart;