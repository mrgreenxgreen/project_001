

import * as React from 'react';
import AppBar from '@mui/material/AppBar';
import Box from '@mui/material/Box';
import Toolbar from '@mui/material/Toolbar';
import Typography from '@mui/material/Typography';
import Button from '@mui/material/Button';
import IconButton from '@mui/material/IconButton';
import MenuIcon from '@mui/icons-material/Menu';
import logo from '../Assets/img/newlogo.jpg'

export default function ButtonAppBar() {
  return (
    <Box sx={{ flexGrow: 1 }}>
          <Box sx={{backgroundColor:"#008042",color:"#ffff",display:"flex",justifyContent:"center"}}>
              <Typography variant ="h5" sx={{fontSize:{xs:'2vw',md:'1vw'},zIndex:"tooltip"}}>
                             Dr. Emilio B. Espinosa Sr. Memorial State College of Agriculture and Technology
                         </Typography>
                  
                         </Box> 
                         <Box sx={{backgroundColor:"#ffbf00",color:"#ffff",display:"flex",justifyContent:"center"}}>
              <Typography variant ="p" sx={{fontSize:{xs:'1vw',md:'.2vw'},zIndex:"tooltip"}}>
                        .
                         </Typography>
                  
                         </Box> 
        
      <AppBar position="static" sx={{display:"flex", justifyContent:"center",backgroundColor:"#ffffff",color:" #26734d"}}>
        <Toolbar>
         
          
          <Typography variant="h4" component="div" sx={{ flexGrow: 1,display:{xs:'none',md:'block'} }}>
            
          </Typography>
          <img alt="logo" src={logo}   width="100" height="100"/>

          <Typography variant="h3" component="div" sx={{fontSize:{xs:'8vw',md:'3vw'},flexGrow:1,fontWeight:"bold"}}>

            CIT-DEBESMSCAT
           
          </Typography>
          
          <IconButton
            size="large"
            edge="start"
            color="inherit"
            aria-label="menu"
            sx={{ mr: 2 ,display:{xs:'none',md:'none'}}}
          >
            <MenuIcon />
          </IconButton>
        </Toolbar>
        <Box sx={{backgroundColor:"#ffbf00",color:"#ffff",display:"flex",justifyContent:"center"}}>
              <Typography variant ="p" sx={{fontSize:{xs:'1vw',md:'.2vw'},zIndex:"tooltip"}}>
                        .
                         </Typography>
                  
                         </Box> 
                         <Box sx={{backgroundColor:"#00331a",color:"#ffff",display:"flex",justifyContent:"center"}}>
              <Typography variant ="h6" sx={{fontSize:{xs:'2vw',md:'2vh'},zIndex:"tooltip",fontStyle:"italic"}}>
                        "Where transformation begins...come and start your future with us."
                         </Typography>
                         
                         </Box> 
      </AppBar>
      
    </Box>
  );
}
