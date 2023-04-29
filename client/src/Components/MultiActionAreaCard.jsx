import * as React from 'react';
import Card from '@mui/material/Card';
import CardContent from '@mui/material/CardContent';
import CardMedia from '@mui/material/CardMedia';
import Typography from '@mui/material/Typography';
import { Button, CardActionArea, CardActions } from '@mui/material';
import hightech from "../Assets/img/hightech.jpg"
export default function MultiActionAreaCard() {
  return (
    <Card sx={{ maxWidth: 345, marginTop:"2vh" }}>
      <CardActionArea>
        <CardMedia
          component="img"
          height="140"
          image={hightech}
          alt="green iguana"
        />
        <CardContent>
          <Typography gutterBottom variant="h5" component="div">
            Digitalized Assessment System
          </Typography>
          <Typography variant="body2" color="text.secondary">
            Interns may now have their assessment online...
          </Typography>
        </CardContent>
      </CardActionArea>
      <CardActions>
        <Button size="small" color="primary">
          <a href="http://cit-debesmscat.com/DAS">Visit </a>
        </Button>
      </CardActions>
    </Card>
  );
}