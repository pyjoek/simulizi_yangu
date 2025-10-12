function StoryPart ({Title, Story}) {
    return (
        <div>
            <h1>{Title}</h1>
            <textarea>{Story}</textarea>
        </div>
    )
}

export default StoryPart;