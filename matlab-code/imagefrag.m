%mat2cell().
clc;    
close all;  
workspace; 
fontSize = 20;
folder = fullfile(matlabroot, '\toolbox\images\imdemos');
baseFileName = 'peppers.png';
fullFileName = fullfile(folder, baseFileName);
if ~exist(fullFileName, 'file')
    fullFileName = baseFileName; 
    if ~exist(fullFileName, 'file')
        errorMessage = sprintf('Error: %s does not exist.', fullFileName);
        uiwait(warndlg(errorMessage));
        return;
    end
end
rgbImage = imread(fullFileName);
imshow(rgbImage);
set(gcf, 'units','normalized','outerposition',[0 0 1 1]);
drawnow;
[rows columns numberOfColorBands] = size(rgbImage)
blockSizeR = 150; 
blockSizeC = 100; 
wholeBlockRows = floor(rows / blockSizeR);
blockVectorR = [blockSizeR * ones(1, wholeBlockRows), rem(rows, blockSizeR)];
wholeBlockCols = floor(columns / blockSizeC);
blockVectorC = [blockSizeC * ones(1, wholeBlockCols), rem(columns, blockSizeC)];
if numberOfColorBands > 1
    ca = mat2cell(rgbImage, blockVectorR, blockVectorC, numberOfColorBands);
else
    ca = mat2cell(rgbImage, blockVectorR, blockVectorC);
end
plotIndex = 1;
numPlotsR = size(ca, 1);
numPlotsC = size(ca, 2);
for r = 1 : numPlotsR
    for c = 1 : numPlotsC
        fprintf('plotindex = %d,   c=%d, r=%d\n', plotIndex, c, r);
        subplot(numPlotsR, numPlotsC, plotIndex);
        rgbBlock = ca{r,c};
        imshow(rgbBlock); 
        [rowsB columnsB numberOfColorBandsB] = size(rgbBlock);
        caption = sprintf('Block #%d of %d\n%d rows by %d columns', ...
            plotIndex, numPlotsR*numPlotsC, rowsB, columnsB);
        title(caption);
        drawnow;
        plotIndex = plotIndex + 1;
    end
end
