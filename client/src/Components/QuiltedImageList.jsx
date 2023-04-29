import * as React from 'react';
import ImageList from '@mui/material/ImageList';
import ImageListItem from '@mui/material/ImageListItem';

function srcset(image, size, rows = 1, cols = 1) {
  return {
    src: `${image}?w=${size * cols}&h=${size * rows}&fit=crop&auto=format`,
    srcSet: `${image}?w=${size * cols}&h=${
      size * rows
    }&fit=crop&auto=format&dpr=2 2x`,
  };
}

export default function QuiltedImageList() {
  return (
    <ImageList
      sx={{ width:{sx:"100vw", md:"40vw"} ,height: "70vh" }}
      variant="quilted"
      cols={4}
      rowHeight={121}
    >
      {itemData.map((item) => (
        <ImageListItem key={item.img} cols={item.cols || 1} rows={item.rows || 1}>
          <img
            {...srcset(item.img, 121, item.rows, item.cols)}
            alt={item.title}
            loading="lazy"
          />
        </ImageListItem>
      ))}
    </ImageList>
    
  );
}

const itemData = [
  {
    img: 'https://cit-debesmscat.com/image-1.jpg',
    title: 'NEWS DEBES 1',
    rows: 2,
    cols: 2,
  },
  {
    img: 'https://cit-debesmscat.com/image-5.jpg',
    title: 'NEWS DEBES 3',
  },
  {
    img: 'https://cit-debesmscat.com/image-3.jpg',
    title: 'NEWS DEBES 2',
  },
  {
    img: 'https://images.unsplash.com/photo-1444418776041-9c7e33cc5a9c',
    title: 'NEWS DEBES 4',
    cols: 3,
  },
  {
    img: 'https://images.unsplash.com/photo-1533827432537-70133748f5c8',
    title: 'NEWS DEBES 5',
    cols: 2,
  },
  {
    img: 'https://cit-debesmscat.com/image-1.jpg',
    title: 'Honey',
    author: '@arwinneil',
    rows: 2,
    cols: 2,
  },
  {
    img: 'https://cit-debesmscat.com/image-2.jpg',
    title: 'Basketball',
  },
  {
    img: 'https://images.unsplash.com/photo-1518756131217-31eb79b20e8f',
    title: 'Fern',
  },
  {
    img: 'https://cit-debesmscat.com/image-4.jpg',
    title: 'Mushrooms',
    rows: 2,
    cols: 3,
  },
  {
    img: 'https://images.unsplash.com/photo-1567306301408-9b74779a11af',
    title: 'Tomato basil',
  },
  {
    img: 'https://images.unsplash.com/photo-1471357674240-e1a485acb3e1',
    title: 'Sea star',
  },
  {
    img: 'https://images.unsplash.com/photo-1589118949245-7d38baf380d6',
    title: 'Bike',
    cols: 4,
  },
];