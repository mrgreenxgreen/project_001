import { Avatar, Box } from "@mui/material"
import Typography from '@mui/material/Typography';
import FacebookIcon from '@mui/icons-material/Facebook';
import TwitterIcon from '@mui/icons-material/Twitter';
import InstagramIcon from '@mui/icons-material/Instagram';
import logo from "../Assets/img/newlogo.jpg"
export default function Footer(){


    return(

        <Box sx={{width:"100vw",  backgroundColor:"green", color:"white",padding:"2vh"}}>
            <Box sx={{margin:"auto",textAlign:"center"}}>
            <FacebookIcon/>
            <TwitterIcon/>
            <InstagramIcon/>
            
            <Avatar alt="logo" src={logo} sx={{margin:"auto"}}/>
            <Typography variant="h5" sx={{fontWeight:"bold"}} >
              DEBESMSCAT
            
            </Typography>
            
            
            <Typography variant="p" sx={{fontWeight:"bold"}} >
                
                Dr. Emilio B. Espinosa Sr. Memorial State College of Agriculture and Technology
            </Typography>
       
            <br/>
            <Typography variant="caption">
                Republic of the Philippines
                <br/>
                Region V - Bicol
                <br/>
                Cabitan, Mandaon, Masbate 5400
                <br/>
                Contact No: 09123456789  &nbsp;&nbsp;&nbsp; |   &nbsp;&nbsp;&nbsp;&nbsp;Email: debesmscat@gmail.com
                <br/>
                By: Kirgepsea Tamayo
                
              
                
            </Typography>
           
            </Box>
        </Box>
    )
}