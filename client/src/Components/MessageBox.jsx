import { Typography } from "@mui/material";
import Box from '@mui/material/Box';


export default function MessageBox(){


    return(

        <Box sx={{display:"flex",width:"100%",  backgroundColor:"green", color:"white"}}>
            <Box sx={{width:{xs:"100vw",md:"50vw"}, padding:"1vw"}}>
            <Typography variant="h3">
            Come and start your future with us...
            </Typography>
             <Typography variant="h4">
            
            </Typography>
            
            <Typography variant="p">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
            </Typography>
            <Box sx={{display:{xs:"block", md:"none"},width:"50vw",padding:"1vw"}}>
            <iframe width="340" height="315" src="https://www.youtube.com/embed/fHJikMmKPBw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </Box>
            </Box>
            <Box sx={{display:{xs:"none",md:"block"},width:"50vw",padding:"1vw"}}>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/fHJikMmKPBw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </Box>
            
        </Box>
    )
}