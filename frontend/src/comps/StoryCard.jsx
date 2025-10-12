import StoryPart from './StoryPart'
import PicCard from './picCard';

function StoryCard({Img, Title, Story}) {
    return (
        <div>
            <StoryPart Title = {Title} Story = {Story} />
            <PicCard Img = {Img} />
        </div>
    )
}

export default StoryCard;