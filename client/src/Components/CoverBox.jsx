import { Box, Typography } from "@mui/material";
import zIndex from "@mui/material/styles/zIndex";
import macbldg from '../Assets/img/macbldg.jpg'


export default function CoverBox(){

    return(

        <Box sx={{ width:"100%", height:{sx:"10vh",md:"34vh"}}}>
   
        <img src={macbldg} width="100%"/>
       
                         </Box>
                         
    

    )
}