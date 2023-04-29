import * as React from 'react';
import AppBar from '@mui/material/AppBar';
import Box from '@mui/material/Box';
import Toolbar from '@mui/material/Toolbar';
import Typography from '@mui/material/Typography';
import Button from '@mui/material/Button';
import IconButton from '@mui/material/IconButton';
import MenuIcon from '@mui/icons-material/Menu';
import SearchIcon from '@mui/icons-material/Search';
import { Stack } from '@mui/material';


export default function BasicAppBar() {
  return (
    <Box sx={{ }}>
      <AppBar position="static" sx={{backgroundColor:" #ffbf00",display:"flex",justifyContent:"center" }}>
        <Toolbar sx={{display:"flex",justifyContent:{xs:"space-between",md:"space-evenly"},width:{xs:"90vw",md:"40vw"},margin:"auto"}}>
          <IconButton
            size="large"
            edge="start"
            color="inherit"
            aria-label="menu"
            sx={{ mr: 2 }}
          >
            <MenuIcon />
        
          </IconButton>
         
          <Typography variant="h6" component="div" sx={{display:{xs:"none",md:"block"}  }}>
            About
          </Typography>
          <Typography variant="h6" component="div" sx={{display:{xs:"none",md:"block"} }}>
            Academics
          </Typography>
          <Typography variant="h6" component="div" sx={{display:{xs:"none",md:"block"} }}>
            Admission
          </Typography>
          <Typography variant="h6" component="div" sx={{ display:{xs:"none",md:"block"}}}>
            Research
          </Typography>
          <Typography variant="h6" component="div" sx={{ display:{xs:"none",md:"block"}}}>
            Extension
          </Typography>
          <Stack>
          <Typography variant="p" >
            
          </Typography>
          <a href="http://cit-debesmscat.com/onlinesystem"  >  <Button color="inherit" sx={{fontWeight:"bold"}}>Login
          
          <SearchIcon sx={{marginLeft:"1vw"}}/></Button></a>
        
          </Stack>
         
        </Toolbar>
      </AppBar>
    </Box>
  );
}