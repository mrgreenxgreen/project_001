import { Typography } from "@mui/material";
import Box from '@mui/material/Box';
import MultiActionAreaCard from "./MultiActionAreaCard";


export default function FeatureBox(){


    return(
        <Box>
        <Box sx={{display:"flex",justifyContent:"center",alignContent:"end" ,width:"100%", height:"500px", backgroundColor:"white", color:"green", }}>
            <Typography variant="h3">
               Features
               
               <MultiActionAreaCard />
            </Typography>
          
        </Box>
       
        </Box>
    )
}