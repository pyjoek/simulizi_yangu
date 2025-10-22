const Family = ({ stories }) => {
  return (
    <div className="row ml-5">
      {stories.map((story) => (
        <div key={story.id} className="col-lg-6 col-md-4 col-sm-6 mb-4">
          <div
            className="px-3 py-2 bg-white d-inline-block"
            style={{
              width: "450px",
              borderRadius: "25px",
              boxShadow: "0px 6px 10px rgba(0, 0, 0, 0.5)",
              height: "300px", // Give a fixed height for consistent layout
              overflow: "hidden", // Prevent content overflow
            }}
          >
            <div
              className="story-image"
              style={{
                height: "80%", // Adjust image container height
                overflow: "hidden", // Hide anything that overflows
              }}
            >
              <img
                src={`http://127.0.0.1:8000/storage/${story.image}`}
                alt={story.title}
                style={{
                  width: "100%",
                  height: "100%",
                  objectFit: "cover",
                }}
              />
            </div>
            <div className="story-title" style={{ paddingTop: "10px", fontWeight: "bold" }}>
              {story.title}
            </div>
          </div>
        </div>
      ))}
    </div>
  );
};

export default Family;
