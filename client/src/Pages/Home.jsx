import { Box, Divider, Typography } from "@mui/material";
import Background from "../Components/Background";

import ButtonAppBar from "../Components/ButtonAppBar";
import Morebutton from "../Components/Morebutton"
import CoverBox from "../Components/CoverBox";
import ImageList from "../Components/QuiltedImageList";
import Footer from "../Components/Footer";
import MessageBox from "../Components/MessageBox";
import FeatureBox from "../Components/FeatureBox";
import BasicAppBar from "../Components/BasicAppBar";

export default function Home(){

    return(
        <Box >
        <ButtonAppBar/>
        <CoverBox/>
       <BasicAppBar/>
        
        <Box sx={{ width:{sx:"100%",md:"40%"},height:"100vh",margin:"auto"}}>
            <Typography variant="h4" sx={{color:"green",marginTop:"5vh"}}>
                Latest News and Updates
            </Typography>
        <ImageList/>
        <Morebutton/>
        
        </Box>
        <MessageBox/>
        <FeatureBox/>
        <Footer/>
        </Box>
    )
}